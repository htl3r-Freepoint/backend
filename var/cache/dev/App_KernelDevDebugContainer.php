<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerVTYS2h1\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerVTYS2h1/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerVTYS2h1.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerVTYS2h1\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerVTYS2h1\App_KernelDevDebugContainer([
    'container.build_hash' => 'VTYS2h1',
    'container.build_id' => '016380a4',
    'container.build_time' => 1610553129,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerVTYS2h1');
