<?php declare(strict_types=1);

namespace Core\Log\Contracts;

use Core\Log\Contracts\Processors\Processor;
use Core\Log\Contracts\Handlers\Handler;
use Core\Log\Contracts\Formatters\Formatter;

use Psr\Log\LoggerInterface;

/**
 * Interface that all Logger implementations must implement
 */
interface Logger extends LoggerInterface
{
    /**
     * @return string Logger object's name.
     */
    public function getName(): string;

    /**
     * Return a new cloned instance with the name changed.
     *
     * @param string $name name of the new instance
     * @return self cloned instance of previous logger
     */
    public function withName(string $name): self;

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
}
