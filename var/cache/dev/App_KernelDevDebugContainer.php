<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerUIBa7In\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerUIBa7In/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerUIBa7In.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerUIBa7In\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerUIBa7In\App_KernelDevDebugContainer([
    'container.build_hash' => 'UIBa7In',
    'container.build_id' => '78560c37',
    'container.build_time' => 1612966654,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerUIBa7In');
