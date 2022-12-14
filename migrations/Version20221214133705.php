<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221214133705 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE stack (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stack_work_field (stack_id INT NOT NULL, work_field_id INT NOT NULL, INDEX IDX_16DC9C5B37C70060 (stack_id), INDEX IDX_16DC9C5B91828DEC (work_field_id), PRIMARY KEY(stack_id, work_field_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE work_field (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stack_work_field ADD CONSTRAINT FK_16DC9C5B37C70060 FOREIGN KEY (stack_id) REFERENCES stack (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stack_work_field ADD CONSTRAINT FK_16DC9C5B91828DEC FOREIGN KEY (work_field_id) REFERENCES work_field (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stack_work_field DROP FOREIGN KEY FK_16DC9C5B37C70060');
        $this->addSql('ALTER TABLE stack_work_field DROP FOREIGN KEY FK_16DC9C5B91828DEC');
        $this->addSql('DROP TABLE stack');
        $this->addSql('DROP TABLE stack_work_field');
        $this->addSql('DROP TABLE work_field');
    }
}
