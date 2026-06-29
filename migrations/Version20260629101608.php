<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260629101608 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidat_job (candidat_id INT NOT NULL, job_id INT NOT NULL, INDEX IDX_93B2BA8C8D0EB82 (candidat_id), INDEX IDX_93B2BA8CBE04EA9 (job_id), PRIMARY KEY (candidat_id, job_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE candidat_job ADD CONSTRAINT FK_93B2BA8C8D0EB82 FOREIGN KEY (candidat_id) REFERENCES candidat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidat_job ADD CONSTRAINT FK_93B2BA8CBE04EA9 FOREIGN KEY (job_id) REFERENCES job (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidat ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B471A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_6AB5B471A76ED395 ON candidat (user_id)');
        $this->addSql('ALTER TABLE job ADD client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F819EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_FBD8E0F819EB6921 ON job (client_id)');
        $this->addSql('ALTER TABLE user ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649A76ED395 ON user (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidat_job DROP FOREIGN KEY FK_93B2BA8C8D0EB82');
        $this->addSql('ALTER TABLE candidat_job DROP FOREIGN KEY FK_93B2BA8CBE04EA9');
        $this->addSql('DROP TABLE candidat_job');
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B471A76ED395');
        $this->addSql('DROP INDEX IDX_6AB5B471A76ED395 ON candidat');
        $this->addSql('ALTER TABLE candidat DROP user_id');
        $this->addSql('ALTER TABLE job DROP FOREIGN KEY FK_FBD8E0F819EB6921');
        $this->addSql('DROP INDEX IDX_FBD8E0F819EB6921 ON job');
        $this->addSql('ALTER TABLE job DROP client_id');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649A76ED395');
        $this->addSql('DROP INDEX IDX_8D93D649A76ED395 ON user');
        $this->addSql('ALTER TABLE user DROP user_id');
    }
}
