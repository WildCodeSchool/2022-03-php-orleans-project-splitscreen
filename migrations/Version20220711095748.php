<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220711095748 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
       $this->addSql("INSERT INTO network(title,link) VALUES('facebook','https://www.facebook.com/splitscreenasso');");
       $this->addSql("INSERT INTO network(title,link) VALUES('instagram','');");
       $this->addSql("INSERT INTO network(title,link) VALUES('twitter','');");
       $this->addSql("INSERT INTO network(title,link) VALUES('tiktok','');");
       $this->addSql("INSERT INTO network(title,link) VALUES('linkedin','');");
       $this->addSql("INSERT INTO network(title,link) VALUES('discord','');");
       $this->addSql("INSERT INTO hello_asso(link) VALUES('https://www.helloasso.com/associations/split-screen');");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
