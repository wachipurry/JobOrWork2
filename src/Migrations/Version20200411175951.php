<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200411175951 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE oferta DROP FOREIGN KEY FK_7479C8F248C925F3');
        $this->addSql('ALTER TABLE oferta ADD CONSTRAINT FK_7479C8F248C925F3 FOREIGN KEY (ofertas) REFERENCES empresa (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE oferta DROP FOREIGN KEY FK_7479C8F248C925F3');
        $this->addSql('ALTER TABLE oferta ADD CONSTRAINT FK_7479C8F248C925F3 FOREIGN KEY (ofertas) REFERENCES empresa (id) ON DELETE SET NULL');
    }
}
