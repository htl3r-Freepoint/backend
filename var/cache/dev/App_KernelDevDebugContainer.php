<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerGzG1QJb\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerGzG1QJb/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerGzG1QJb.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerGzG1QJb\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerGzG1QJb\App_KernelDevDebugContainer([
    'container.build_hash' => 'GzG1QJb',
    'container.build_id' => '8672fa80',
    'container.build_time' => 1602152322,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerGzG1QJb');
