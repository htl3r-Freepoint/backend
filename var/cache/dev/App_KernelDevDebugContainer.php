<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerJVdNJcl\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerJVdNJcl/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerJVdNJcl.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerJVdNJcl\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerJVdNJcl\App_KernelDevDebugContainer([
    'container.build_hash' => 'JVdNJcl',
    'container.build_id' => 'b80bbe54',
    'container.build_time' => 1604315652,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerJVdNJcl');
