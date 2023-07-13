<?php declare(strict_types=1);

namespace WebCore\Log\Contracts;

use WebCore\Log\Contracts\Processors\Processor;
use WebCore\Log\Contracts\Handlers\Handler;
use WebCore\Log\Contracts\Formatters\Formatter;
use DateTimeZone;
use Psr\Log\LoggerInterface;

/**
 * Interface that all Logger implementations must implement
 */
interface Logger extends LoggerInterface
{
    /**
     * @return string Logger object's channel name
     */
    public function getChannel(): string;

    /**
     * Return a new cloned instance with the channel name changed.
     *
     * @param string $channel channel name of the new instance
     * @return self cloned instance of previous logger
     */
    public function withChannel(string $channel): self;

    /**
     * Adds a processor on to the stack.
     *
     * @param Processor $processor the processor to push
     * @return self current logger intance
     */
    public function pushProcessor(Processor $processor): self;

    /**
     * Removes the processor from top of the stack and returns it.
     *
     * @return Processor processor removed from the stack
     * @throws \LogicException if empty processor stack
     */
    public function popProcessor(): Processor;

    /**
     * Set processors, replacing all existing ones.
     *
     * @param Processor $processors new processors to use
     * @return self current logger instance
     */
    public function setProcessors(Processor ...$processors): self;

    /**
     * Get all currently assigned processors.
     *
     * @return array<Processor> assigned processors
     */
    public function getProcessors(): array;

    /**
     * Pushes a handler on to the stack.
     *
     * @param Handler $handler the handler to push
     * @return self current logger instance
     */
    public function pushHandler(Handler $handler): self;

    /**
     * Pops a handler from the stack.
     *
     * @return Handler handler removed from the stack
     * @throws \LogicException If empty handler stack
     */
    public function popHandler(): Handler;

    /**
     * Set handlers, replacing all existing ones.
     *
     * @param Handler $handlers new handlers to use
     * @return self current logger instance
     */
    public function setHandlers(Handler ...$handlers): self;

    /**
     * Get all currently assigned handlers.
     *
     * @return array<Handler> assigned handlers
     */
    public function getHandlers(): array;

    /**
     * Ends a log cycle and frees all resources used by handlers.
     *
     * Closing a Handler means flushing all buffers and freeing any open resources/handles.

     * This is useful at the end of a request and will be called automatically on every handler
     * when they get destructed.
     */
    public function close(): void;
}
