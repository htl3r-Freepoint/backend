<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerBCEcQKB\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerBCEcQKB/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerBCEcQKB.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerBCEcQKB\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerBCEcQKB\App_KernelDevDebugContainer([
    'container.build_hash' => 'BCEcQKB',
    'container.build_id' => 'a713c86e',
    'container.build_time' => 1601719912,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerBCEcQKB');
