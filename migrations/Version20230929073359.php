<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230929073359 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lieux (id INT AUTO_INCREMENT NOT NULL, latitude_depart_id INT DEFAULT NULL, logitude_depart_id INT DEFAULT NULL, latitude_arrivee_id INT DEFAULT NULL, longitude_arrivee_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_9E44A8AE9AAE6AC (latitude_depart_id), UNIQUE INDEX UNIQ_9E44A8AE87619456 (logitude_depart_id), UNIQUE INDEX UNIQ_9E44A8AED439A181 (latitude_arrivee_id), UNIQUE INDEX UNIQ_9E44A8AEEC34DEAD (longitude_arrivee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lieux ADD CONSTRAINT FK_9E44A8AE9AAE6AC FOREIGN KEY (latitude_depart_id) REFERENCES flotte (id)');
        $this->addSql('ALTER TABLE lieux ADD CONSTRAINT FK_9E44A8AE87619456 FOREIGN KEY (logitude_depart_id) REFERENCES flotte (id)');
        $this->addSql('ALTER TABLE lieux ADD CONSTRAINT FK_9E44A8AED439A181 FOREIGN KEY (latitude_arrivee_id) REFERENCES flotte (id)');
        $this->addSql('ALTER TABLE lieux ADD CONSTRAINT FK_9E44A8AEEC34DEAD FOREIGN KEY (longitude_arrivee_id) REFERENCES flotte (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lieux DROP FOREIGN KEY FK_9E44A8AE9AAE6AC');
        $this->addSql('ALTER TABLE lieux DROP FOREIGN KEY FK_9E44A8AE87619456');
        $this->addSql('ALTER TABLE lieux DROP FOREIGN KEY FK_9E44A8AED439A181');
        $this->addSql('ALTER TABLE lieux DROP FOREIGN KEY FK_9E44A8AEEC34DEAD');
        $this->addSql('DROP TABLE lieux');
    }
}
