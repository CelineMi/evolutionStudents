<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191111112401 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE week_notation (week_id INT NOT NULL, notation_id INT NOT NULL, INDEX IDX_BA270FE0C86F3B2F (week_id), INDEX IDX_BA270FE09680B7F7 (notation_id), PRIMARY KEY(week_id, notation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE week_notation ADD CONSTRAINT FK_BA270FE0C86F3B2F FOREIGN KEY (week_id) REFERENCES week (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE week_notation ADD CONSTRAINT FK_BA270FE09680B7F7 FOREIGN KEY (notation_id) REFERENCES notation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE notation ADD CONSTRAINT FK_268BC95A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_268BC95A76ED395 ON notation (user_id)');
        $this->addSql('ALTER TABLE week ADD CONSTRAINT FK_5B5A69C0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_5B5A69C0A76ED395 ON week (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE week_notation');
        $this->addSql('ALTER TABLE notation DROP FOREIGN KEY FK_268BC95A76ED395');
        $this->addSql('DROP INDEX IDX_268BC95A76ED395 ON notation');
        $this->addSql('ALTER TABLE week DROP FOREIGN KEY FK_5B5A69C0A76ED395');
        $this->addSql('DROP INDEX IDX_5B5A69C0A76ED395 ON week');
    }
}
