<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230119104809 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidacy (id INT AUTO_INCREMENT NOT NULL, candidate_id INT NOT NULL, offer_id INT NOT NULL, status_id INT NOT NULL, candidacy_date DATETIME NOT NULL, INDEX IDX_D930569D91BD8781 (candidate_id), INDEX IDX_D930569D53C674EE (offer_id), INDEX IDX_D930569D6BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidacy_status (id INT AUTO_INCREMENT NOT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidate (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, gender VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, picture VARCHAR(255) DEFAULT NULL, curriculum_vitae VARCHAR(255) DEFAULT NULL, address VARCHAR(255) NOT NULL, address_complement VARCHAR(255) DEFAULT NULL, postal_code VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, birthday DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_C8B28E44A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidate_stack (candidate_id INT NOT NULL, stack_id INT NOT NULL, INDEX IDX_7948909691BD8781 (candidate_id), INDEX IDX_7948909637C70060 (stack_id), PRIMARY KEY(candidate_id, stack_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidate_contract (candidate_id INT NOT NULL, contract_id INT NOT NULL, INDEX IDX_48D16A8A91BD8781 (candidate_id), INDEX IDX_48D16A8A2576E0FD (contract_id), PRIMARY KEY(candidate_id, contract_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contract (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offer (id INT AUTO_INCREMENT NOT NULL, contract_id INT NOT NULL, recruiter_id INT NOT NULL, work_field_id INT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, address VARCHAR(255) NOT NULL, publication_date DATETIME NOT NULL, postal_code VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, address_complement VARCHAR(255) DEFAULT NULL, INDEX IDX_29D6873E2576E0FD (contract_id), INDEX IDX_29D6873E156BE243 (recruiter_id), INDEX IDX_29D6873E91828DEC (work_field_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offer_stack (offer_id INT NOT NULL, stack_id INT NOT NULL, INDEX IDX_C285068353C674EE (offer_id), INDEX IDX_C285068337C70060 (stack_id), PRIMARY KEY(offer_id, stack_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partner (id INT AUTO_INCREMENT NOT NULL, logo VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(1000) NOT NULL, url VARCHAR(255) NOT NULL, picture VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recruiter (id INT AUTO_INCREMENT NOT NULL, partner_id INT NOT NULL, user_id INT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, position VARCHAR(255) NOT NULL, INDEX IDX_DE8633D89393F8FE (partner_id), UNIQUE INDEX UNIQ_DE8633D8A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stack (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stack_work_field (stack_id INT NOT NULL, work_field_id INT NOT NULL, INDEX IDX_16DC9C5B37C70060 (stack_id), INDEX IDX_16DC9C5B91828DEC (work_field_id), PRIMARY KEY(stack_id, work_field_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE work_field (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidacy ADD CONSTRAINT FK_D930569D91BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id)');
        $this->addSql('ALTER TABLE candidacy ADD CONSTRAINT FK_D930569D53C674EE FOREIGN KEY (offer_id) REFERENCES offer (id)');
        $this->addSql('ALTER TABLE candidacy ADD CONSTRAINT FK_D930569D6BF700BD FOREIGN KEY (status_id) REFERENCES candidacy_status (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E44A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE candidate_stack ADD CONSTRAINT FK_7948909691BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidate_stack ADD CONSTRAINT FK_7948909637C70060 FOREIGN KEY (stack_id) REFERENCES stack (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidate_contract ADD CONSTRAINT FK_48D16A8A91BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidate_contract ADD CONSTRAINT FK_48D16A8A2576E0FD FOREIGN KEY (contract_id) REFERENCES contract (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873E2576E0FD FOREIGN KEY (contract_id) REFERENCES contract (id)');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873E156BE243 FOREIGN KEY (recruiter_id) REFERENCES recruiter (id)');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873E91828DEC FOREIGN KEY (work_field_id) REFERENCES work_field (id)');
        $this->addSql('ALTER TABLE offer_stack ADD CONSTRAINT FK_C285068353C674EE FOREIGN KEY (offer_id) REFERENCES offer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE offer_stack ADD CONSTRAINT FK_C285068337C70060 FOREIGN KEY (stack_id) REFERENCES stack (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recruiter ADD CONSTRAINT FK_DE8633D89393F8FE FOREIGN KEY (partner_id) REFERENCES partner (id)');
        $this->addSql('ALTER TABLE recruiter ADD CONSTRAINT FK_DE8633D8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE stack_work_field ADD CONSTRAINT FK_16DC9C5B37C70060 FOREIGN KEY (stack_id) REFERENCES stack (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stack_work_field ADD CONSTRAINT FK_16DC9C5B91828DEC FOREIGN KEY (work_field_id) REFERENCES work_field (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidacy DROP FOREIGN KEY FK_D930569D91BD8781');
        $this->addSql('ALTER TABLE candidacy DROP FOREIGN KEY FK_D930569D53C674EE');
        $this->addSql('ALTER TABLE candidacy DROP FOREIGN KEY FK_D930569D6BF700BD');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E44A76ED395');
        $this->addSql('ALTER TABLE candidate_stack DROP FOREIGN KEY FK_7948909691BD8781');
        $this->addSql('ALTER TABLE candidate_stack DROP FOREIGN KEY FK_7948909637C70060');
        $this->addSql('ALTER TABLE candidate_contract DROP FOREIGN KEY FK_48D16A8A91BD8781');
        $this->addSql('ALTER TABLE candidate_contract DROP FOREIGN KEY FK_48D16A8A2576E0FD');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873E2576E0FD');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873E156BE243');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873E91828DEC');
        $this->addSql('ALTER TABLE offer_stack DROP FOREIGN KEY FK_C285068353C674EE');
        $this->addSql('ALTER TABLE offer_stack DROP FOREIGN KEY FK_C285068337C70060');
        $this->addSql('ALTER TABLE recruiter DROP FOREIGN KEY FK_DE8633D89393F8FE');
        $this->addSql('ALTER TABLE recruiter DROP FOREIGN KEY FK_DE8633D8A76ED395');
        $this->addSql('ALTER TABLE stack_work_field DROP FOREIGN KEY FK_16DC9C5B37C70060');
        $this->addSql('ALTER TABLE stack_work_field DROP FOREIGN KEY FK_16DC9C5B91828DEC');
        $this->addSql('DROP TABLE candidacy');
        $this->addSql('DROP TABLE candidacy_status');
        $this->addSql('DROP TABLE candidate');
        $this->addSql('DROP TABLE candidate_stack');
        $this->addSql('DROP TABLE candidate_contract');
        $this->addSql('DROP TABLE contract');
        $this->addSql('DROP TABLE offer');
        $this->addSql('DROP TABLE offer_stack');
        $this->addSql('DROP TABLE partner');
        $this->addSql('DROP TABLE recruiter');
        $this->addSql('DROP TABLE stack');
        $this->addSql('DROP TABLE stack_work_field');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE work_field');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
