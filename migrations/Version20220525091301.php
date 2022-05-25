<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220525091301 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD1A2FE286F');
        $this->addSql('DROP INDEX IDX_C11D7DD1A2FE286F ON promotion');
        $this->addSql('ALTER TABLE promotion ADD formateur_id INT DEFAULT NULL, CHANGE formateur_id_id formation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD15200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD1155D8F51 FOREIGN KEY (formateur_id) REFERENCES formateur (id)');
        $this->addSql('CREATE INDEX IDX_C11D7DD15200282E ON promotion (formation_id)');
        $this->addSql('CREATE INDEX IDX_C11D7DD1155D8F51 ON promotion (formateur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD15200282E');
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD1155D8F51');
        $this->addSql('DROP INDEX IDX_C11D7DD15200282E ON promotion');
        $this->addSql('DROP INDEX IDX_C11D7DD1155D8F51 ON promotion');
        $this->addSql('ALTER TABLE promotion ADD formateur_id_id INT DEFAULT NULL, DROP formation_id, DROP formateur_id');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD1A2FE286F FOREIGN KEY (formateur_id_id) REFERENCES formation (id)');
        $this->addSql('CREATE INDEX IDX_C11D7DD1A2FE286F ON promotion (formateur_id_id)');
    }
}
