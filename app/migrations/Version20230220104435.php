<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230220104435 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE housing DROP FOREIGN KEY FK_FB8142C39D86650F');
        $this->addSql('DROP INDEX IDX_FB8142C39D86650F ON housing');
        $this->addSql('ALTER TABLE housing DROP user_id_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE housing ADD user_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE housing ADD CONSTRAINT FK_FB8142C39D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_FB8142C39D86650F ON housing (user_id_id)');
    }
}
