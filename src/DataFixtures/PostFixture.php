<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PostFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 20; $i++) {
            $post = new Post();
            $post->setTitle('this is my title'.rand(0,100));
            $post->setAuthor('this is the author'.rand(0,100));
            $post->setPostDate(new \DateTime());
            $post->setContent('this is my content'.rand(0,100));
            $manager->persist($post);
        }

        $manager->flush();
    }
}
