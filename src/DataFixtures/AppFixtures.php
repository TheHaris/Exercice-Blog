<?php

namespace App\DataFixtures;

use App\Entity\Posts;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class AppFixtures extends Fixture
{
  public function load(ObjectManager $manager)
  {
    for ($i = 0; $i < 20; $i++) {
        $post = new Posts();
        $post->setTitle('This is my title '.rand(0,100));
        $post->setAuthor('this is the author'.rand(0,100));
        $post->setPostDate(new \DateTime());
        $post->setContent('this is my content'.rand(0,100));
        $manager->persist($post);
    }
      $manager->flush();
  }

}
