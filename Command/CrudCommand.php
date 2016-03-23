<?php

/*
 * This file is part of the CrudGeneratorBundle
 *
 * It is based/extended from SensioGeneratorBundle
 *
 * (c) Jordi Llonch <llonch.jordi@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RBSoft\ABMGeneratorBundle\Command;


use RBSoft\ABMGeneratorBundle\Generator\RBSoftCrudGenerator;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Sensio\Bundle\GeneratorBundle\Command\GenerateDoctrineCrudCommand;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;


class CrudCommand extends GenerateDoctrineCrudCommand
{
    protected $generator;
    protected $formGenerator;

    protected function configure()
    {
        parent::configure();

        $this->setName('RBSoft:generate:crud');
        $this->setDescription('A CRUD generator with paginating and filters.');
    }

    protected function createGenerator($bundle = null)
    {
        $generator = new RBSoftCrudGenerator(
            $this->getContainer()->get('filesystem'),
            $this->getContainer()->getParameter('kernel.root_dir')
        );
        $cr =$this->getContainer()->getParameter("rbsoft.crud");

        ld($cr);
        $generator->setCrudParm( $cr);
        return  $generator;
    }

    protected function getSkeletonDirs(BundleInterface $bundle = null)
    {
        $skeletonDirs = array();

        if (isset($bundle) && is_dir($dir = $bundle->getPath().'/Resources/SensioGeneratorBundle/skeleton')) {
            $skeletonDirs[] = $dir;
        }

        if (is_dir($dir = $this->getContainer()->get('kernel')->getRootdir().'/Resources/SensioGeneratorBundle/skeleton')) {
            $skeletonDirs[] = $dir;
        }

        $skeletonDirs[] = $this->getContainer()->get('kernel')->locateResource('@ABMGeneratorBundle/Resources/skeleton');
        $skeletonDirs[] = $this->getContainer()->get('kernel')->locateResource('@ABMGeneratorBundle/Resources');

        return $skeletonDirs;
    }

    protected function interact(InputInterface $input, OutputInterface $output)
    {
        $questionHelper = $this->getQuestionHelper();
        $questionHelper->writeSection($output, 'Bienvenido a RBSoft CRUD generador');


        parent::interact($input, $output);
    }
}
