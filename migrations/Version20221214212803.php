<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221214212803 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE offer_stack (offer_id INT NOT NULL, stack_id INT NOT NULL, INDEX IDX_C285068353C674EE (offer_id), INDEX IDX_C285068337C70060 (stack_id), PRIMARY KEY(offer_id, stack_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE offer_stack ADD CONSTRAINT FK_C285068353C674EE FOREIGN KEY (offer_id) REFERENCES offer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE offer_stack ADD CONSTRAINT FK_C285068337C70060 FOREIGN KEY (stack_id) REFERENCES stack (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE offer ADD work_field_id INT NOT NULL');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873E91828DEC FOREIGN KEY (work_field_id) REFERENCES work_field (id)');
        $this->addSql('CREATE INDEX IDX_29D6873E91828DEC ON offer (work_field_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offer_stack DROP FOREIGN KEY FK_C285068353C674EE');
        $this->addSql('ALTER TABLE offer_stack DROP FOREIGN KEY FK_C285068337C70060');
        $this->addSql('DROP TABLE offer_stack');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873E91828DEC');
        $this->addSql('DROP INDEX IDX_29D6873E91828DEC ON offer');
        $this->addSql('ALTER TABLE offer DROP work_field_id');
    }
}
