<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250215182316 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE exemplaire (id SERIAL NOT NULL, usure_id INT NOT NULL, stock_id INT NOT NULL, livre_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5EF83C921117BEE5 ON exemplaire (usure_id)');
        $this->addSql('CREATE INDEX IDX_5EF83C92DCD6110 ON exemplaire (stock_id)');
        $this->addSql('CREATE INDEX IDX_5EF83C9237D925CB ON exemplaire (livre_id)');
        $this->addSql('CREATE TABLE livre_genre (livre_id INT NOT NULL, genre_id INT NOT NULL, PRIMARY KEY(livre_id, genre_id))');
        $this->addSql('CREATE INDEX IDX_1053AB9E37D925CB ON livre_genre (livre_id)');
        $this->addSql('CREATE INDEX IDX_1053AB9E4296D31F ON livre_genre (genre_id)');
        $this->addSql('ALTER TABLE exemplaire ADD CONSTRAINT FK_5EF83C921117BEE5 FOREIGN KEY (usure_id) REFERENCES usure (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE exemplaire ADD CONSTRAINT FK_5EF83C92DCD6110 FOREIGN KEY (stock_id) REFERENCES stock (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE exemplaire ADD CONSTRAINT FK_5EF83C9237D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE livre_genre ADD CONSTRAINT FK_1053AB9E37D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE livre_genre ADD CONSTRAINT FK_1053AB9E4296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE exemplaire DROP CONSTRAINT FK_5EF83C921117BEE5');
        $this->addSql('ALTER TABLE exemplaire DROP CONSTRAINT FK_5EF83C92DCD6110');
        $this->addSql('ALTER TABLE exemplaire DROP CONSTRAINT FK_5EF83C9237D925CB');
        $this->addSql('ALTER TABLE livre_genre DROP CONSTRAINT FK_1053AB9E37D925CB');
        $this->addSql('ALTER TABLE livre_genre DROP CONSTRAINT FK_1053AB9E4296D31F');
        $this->addSql('DROP TABLE exemplaire');
        $this->addSql('DROP TABLE livre_genre');
    }
}
