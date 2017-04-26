<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new Gt\ItBundle\GtItBundle(),
            new FOS\UserBundle\FOSUserBundle(),
            new Utilisateurs\UtilisateursBundle\UtilisateursBundle(),
            new Liip\ImagineBundle\LiipImagineBundle,
            new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(), 
            new Knp\Bundle\TimeBundle\KnpTimeBundle(), new Knp\Bundle\MenuBundle\KnpMenuBundle(),
              new JavierEguiluz\Bundle\EasyAdminBundle\EasyAdminBundle(),  new Vich\UploaderBundle\VichUploaderBundle(),
                        new Ivory\CKEditorBundle\IvoryCKEditorBundle(),       new SC\DatetimepickerBundle\SCDatetimepickerBundle(),   new Genemu\Bundle\FormBundle\GenemuFormBundle(),
        

        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
