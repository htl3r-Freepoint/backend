<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerQOJLoTi\App_KernelProdContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerQOJLoTi/App_KernelProdContainer.php') {
    touch(__DIR__.'/ContainerQOJLoTi.legacy');

    return;
}

if (!\class_exists(App_KernelProdContainer::class, false)) {
    \class_alias(\ContainerQOJLoTi\App_KernelProdContainer::class, App_KernelProdContainer::class, false);
}

return new \ContainerQOJLoTi\App_KernelProdContainer([
    'container.build_hash' => 'QOJLoTi',
    'container.build_id' => '4a67132a',
    'container.build_time' => 1602149205,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerQOJLoTi');