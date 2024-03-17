<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240313165353 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("INSERT INTO stage.district (id, name, all_population, male_population, female_population) VALUES (1, 'Центральный ФО', 40334532, 18682816, 21651716);
INSERT INTO stage.district (id, name, all_population, male_population, female_population) VALUES (2, 'Северо-западный ФО', 13917197, 6379110, 7538087);
INSERT INTO stage.district (id, name, all_population, male_population, female_population) VALUES (3, 'Южный ФО', 16746442, 7848276, 8898166);
INSERT INTO stage.district (id, name, all_population, male_population, female_population) VALUES (4, 'Северо-Кавказский ФО', 10171434, 4921947, 5249487);
INSERT INTO stage.district (id, name, all_population, male_population, female_population) VALUES (5, 'Приволжский ФО', 28943264, 13373323, 15569941);
INSERT INTO stage.district (id, name, all_population, male_population, female_population) VALUES (6, 'Уральский ФО', 12300793, 5715990, 6584803);
INSERT INTO stage.district (id, name, all_population, male_population, female_population) VALUES (7, 'Сибирский ФО', 16792699, 7733997, 9058702);
INSERT INTO stage.district (id, name, all_population, male_population, female_population) VALUES (8, 'Дальневосточный ФО', 7975762, 3776121, 4199641);
");
    }

    public function down(Schema $schema): void
    {
    }
}
