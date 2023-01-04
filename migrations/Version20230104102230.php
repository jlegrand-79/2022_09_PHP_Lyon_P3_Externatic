<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230104102230 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidate_contract (candidate_id INT NOT NULL, contract_id INT NOT NULL, INDEX IDX_48D16A8A91BD8781 (candidate_id), INDEX IDX_48D16A8A2576E0FD (contract_id), PRIMARY KEY(candidate_id, contract_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidate_contract ADD CONSTRAINT FK_48D16A8A91BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidate_contract ADD CONSTRAINT FK_48D16A8A2576E0FD FOREIGN KEY (contract_id) REFERENCES contract (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidate ADD birthday DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidate_contract DROP FOREIGN KEY FK_48D16A8A91BD8781');
        $this->addSql('ALTER TABLE candidate_contract DROP FOREIGN KEY FK_48D16A8A2576E0FD');
        $this->addSql('DROP TABLE candidate_contract');
        $this->addSql('ALTER TABLE candidate DROP birthday');
    }
}
