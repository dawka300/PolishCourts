<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210205185254 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Judges (id INT AUTO_INCREMENT NOT NULL, graduation_university_id INT DEFAULT NULL, position_id INT DEFAULT NULL, delegated_to_id INT DEFAULT NULL, delegated_from_id INT DEFAULT NULL, workplace_id INT NOT NULL, name_division_id INT NOT NULL, first_name VARCHAR(100) NOT NULL, second_name VARCHAR(100) DEFAULT NULL, last_name VARCHAR(100) NOT NULL, birth_date DATE NOT NULL, graduation_date DATE DEFAULT NULL, since_judge DATE DEFAULT NULL, since_current_court DATE DEFAULT NULL, number_division SMALLINT NOT NULL, additional_information LONGTEXT DEFAULT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, INDEX IDX_669E5835B1497A7 (graduation_university_id), INDEX IDX_669E583DD842E46 (position_id), INDEX IDX_669E58335EF05C1 (delegated_to_id), INDEX IDX_669E58354C6F93D (delegated_from_id), INDEX IDX_669E583AC25FB46 (workplace_id), INDEX IDX_669E58342ABDE55 (name_division_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Judges ADD CONSTRAINT FK_669E5835B1497A7 FOREIGN KEY (graduation_university_id) REFERENCES universities (id)');
        $this->addSql('ALTER TABLE Judges ADD CONSTRAINT FK_669E583DD842E46 FOREIGN KEY (position_id) REFERENCES positions (id)');
        $this->addSql('ALTER TABLE Judges ADD CONSTRAINT FK_669E58335EF05C1 FOREIGN KEY (delegated_to_id) REFERENCES courts (id)');
        $this->addSql('ALTER TABLE Judges ADD CONSTRAINT FK_669E58354C6F93D FOREIGN KEY (delegated_from_id) REFERENCES courts (id)');
        $this->addSql('ALTER TABLE Judges ADD CONSTRAINT FK_669E583AC25FB46 FOREIGN KEY (workplace_id) REFERENCES courts (id)');
        $this->addSql('ALTER TABLE Judges ADD CONSTRAINT FK_669E58342ABDE55 FOREIGN KEY (name_division_id) REFERENCES divisions (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE Judges');
    }
}
