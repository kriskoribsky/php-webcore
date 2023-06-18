<?php declare(strict_types=1);

namespace WebCore\Log\Implementations;

use WebCore\Log\Contracts\Logger as LoggerContract;
use WebCore\Log\Contracts\LogLevel;
use WebCore\Log\Contracts\Processors\Processor;
use WebCore\Log\Contracts\Handlers\Handler;

use Psr\Log\LoggerTrait;

final class Logger implements LoggerContract
{
    use LoggerTrait;

    private array $processors;
    private array $handlers;

    public function __construct(private string $channel)
    {
    }

    public function log(mixed $level, string|\Stringable $message, array $context = []): void
    {
        $level = LogLevel::fromMixed($level);

        $this->send($level, $message, $context);
    }

    public function getChannel(): string
    {
        return $this->channel;
    }

    public function withChannel(string $channel): self
    {
        $new = clone $this;
        $new->channel = $channel;

        return $new;
    }

    public function pushProcessor(Processor $processor): self
    {
        $this->processors[] = $processor;

        return $this;
    }

    public function popProcessor(): Processor
    {
        $processor = \array_pop($this->processors);

        if ($processor === null) {
            // REFACTOR use custom exception here when later created
            throw new \LogicException('You tried to pop from an empty processor stack.');
        }

        return $processor;
    }

    public function setProcessors(Processor ...$processors): self
    {
        $this->processors = $processors;

        return $this;
    }

    public function getProcessors(): array
    {
        return $this->processors;
    }

    public function pushHandler(Handler $handler): self
    {
        $this->handlers[] = $handler;

        return $this;
    }

    public function popHandler(): Handler
    {
        $handler = \array_pop($this->handlers);

        if ($handler === null) {
            // REFACTOR use custom exception here when later created
            throw new \LogicException('You tried to pop from an empty handler stack.');
        }

        return $handler;
    }

    public function setHandlers(Handler ...$handlers): self
    {
        $this->handlers = $handlers;

        return $this;
    }

    public function getHandlers(): array
    {
        return $this->handlers;
    }

    public function close(): void
    {
        foreach ($this->handlers as $handler) {
            $handler->close();
        }
    }

    /**
     * Processes the log message by the registered processors first, and then
     * sends it to the handlers for further changes and storage.
     *
     * @param LogLevel $level The log level of the message
     * @param string $message The log message
     * @param array $context The contextual data associated with the log message
     * @return void
     */
    private function send(LogLevel $level, string $message, array $context): void
    {
        $record = new LogRecord(
            channel: $this->channel,
            level: $level,
            message: $message,
            context: $context,
            extra: [],
        );

        foreach ($this->processors as $processor) {
            $record = $processor($record);
        }
    }
}
