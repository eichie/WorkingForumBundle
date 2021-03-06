<?php

namespace Yosimitso\WorkingForumBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class YosimitsoWorkingForumExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

         if (!isset($config['thread_per_page'])) {
        throw new \InvalidArgumentException('The "thread_per_page" option must be set in "yosimitso_working_forum"');
        }
         if (!isset($config['post_per_page'])) {
        throw new \InvalidArgumentException('The "post_per_page" option must be set in "yosimitso_working_forum"');
        }
        
           if (!isset($config['date_format'])) {
        throw new \InvalidArgumentException('The "post_per_page" option must be set in "yosimitso_working_forum"');
        }
        
          if (!isset($config['allow_anonymous_read'])) {
        throw new \InvalidArgumentException('The "allow_anonymous_read" option must be set in "yosimitso_working_forum"');
        }
        
           if (!isset($config['allow_moderator_delete_thread'])) {
        throw new \InvalidArgumentException('The "allow_moderator_delete_thread" option must be set in "yosimitso_working_forum"');
        }
        
        
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
         $container->setParameter('yosimitso_working_forum.thread_per_page', $config['thread_per_page']);
         $container->setParameter('yosimitso_working_forum.post_per_page', $config['post_per_page']);
         $container->setParameter('yosimitso_working_forum.date_format', $config['date_format']);
         $container->setParameter('yosimitso_working_forum.allow_anonymous_read', $config['allow_anonymous_read']);
         $container->setParameter('yosimitso_working_forum.allow_moderator_delete_thread', $config['allow_moderator_delete_thread']);
         
    }
}
