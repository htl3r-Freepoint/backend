<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container0xTPpuE\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container0xTPpuE/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/Container0xTPpuE.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\Container0xTPpuE\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \Container0xTPpuE\App_KernelDevDebugContainer([
    'container.build_hash' => '0xTPpuE',
    'container.build_id' => 'a6aea2a6',
    'container.build_time' => 1611660947,
], __DIR__.\DIRECTORY_SEPARATOR.'Container0xTPpuE');
