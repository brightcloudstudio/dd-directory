<?php

 /**
 * @copyright  Bright Cloud Studio
 * @author     Bright Cloud Studio
 */
    
namespace BCS\DDDirectory\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\Form;

#[AsHook('processFormData')]
class ProcessFormDataListener
{
    /**
     * The Contao project root directory, injected via the constructor.
     * In services.yaml bind "%kernel.project_dir%" to $projectDir.
     */
    public function __construct(private readonly string $projectDir)
    {
    }

    public function __invoke(array &$submittedData, array $labels, array $fields, Form $form): void
    {
        echo "HOOKED!";
        die();
    }
}
