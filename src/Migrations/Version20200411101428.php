<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200411101428 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B471FAFBF624');
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY candidat_ibfk_1');
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY candidat_ibfk_2');
        $this->addSql('DROP INDEX IDX_6AB5B471FAFBF624 ON candidat');
        $this->addSql('ALTER TABLE candidat CHANGE oferta_id ofertaCandidat INT DEFAULT NULL');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B471F1000EFA FOREIGN KEY (ofertaCandidat) REFERENCES oferta (id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_6AB5B471F1000EFA ON candidat (ofertaCandidat)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B471F1000EFA');
        $this->addSql('DROP INDEX IDX_6AB5B471F1000EFA ON candidat');
        $this->addSql('ALTER TABLE candidat CHANGE ofertacandidat oferta_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B471FAFBF624 FOREIGN KEY (oferta_id) REFERENCES oferta (id)');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT candidat_ibfk_1 FOREIGN KEY (oferta_id) REFERENCES oferta (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT candidat_ibfk_2 FOREIGN KEY (oferta_id) REFERENCES oferta (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_6AB5B471FAFBF624 ON candidat (oferta_id)');
    }
}
