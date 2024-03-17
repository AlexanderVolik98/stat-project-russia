<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240313165441 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("
        INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (1, 1, 'Белгородская область', 1540486, 421864, 249422, 869200);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (2, 1, 'Брянская область', 1169161, 325889, 181442, 661830);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (3, 1, 'Владимирская область', 1348134, 393256, 199074, 755804);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (4, 1, 'Воронежская область', 2308792, 646791, 334772, 1327229);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (5, 1, 'Ивановская область', 927828, 272342, 141976, 513510);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (6, 1, 'Калужская область', 1069904, 281183, 175697, 613024);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (7, 1, 'Костромская область', 580976, 167330, 102829, 310817);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (8, 1, 'Курская область', 1082458, 308597, 173016, 600845);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (9, 1, 'Липецкая область', 1143224, 311098, 191071, 641055);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (10, 1, 'Московская область', 8524665, 1980602, 1176773, 5367290);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (11, 1, 'Орловская область', 713374, 205882, 106298, 401194);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (12, 1, 'Рязанская область', 1102810, 324699, 164119, 613992);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (13, 1, 'Смоленская область', 888421, 259151, 126413, 502857);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (14, 1, 'Тамбовская область', 982991, 297180, 138477, 547334);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (15, 1, 'Тверская область', 1230171, 366875, 176273, 687023);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (16, 1, 'Тульская область', 1501214, 450633, 203501, 847080);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (17, 1, 'Ярославская область', 1209811, 340709, 201277, 667825);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (18, 1, 'г. Москва', 13010112, 3286748, 1737754, 7985610);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (19, 2, 'Республика Карелия', 533121, 151116, 91153, 290852);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (20, 2, 'Республика Коми', 737853, 175811, 138619, 423423);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (21, 2, 'Архангельская область', 1020307, 273663, 182909, 563735);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (22, 2, 'Ненецкий автономный округ', 41434, 7789, 9329, 24316);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (23, 2, 'Архангельская область без автономного округа', 978873, 265874, 173580, 539419);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (24, 2, 'Вологодская область', 1142827, 303471, 205633, 633723);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (25, 2, 'Калининградская область', 1029966, 256773, 167555, 605638);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (26, 2, 'Ленинградская область', 2000997, 514398, 277472, 1209127);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (27, 2, 'Мурманская область', 667744, 149187, 121351, 397206);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (28, 2, 'Новгородская область', 583387, 172398, 97529, 313460);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (29, 2, 'Псковская область', 599084, 175053, 93020, 331011);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (30, 2, 'г. Санкт-Петербург', 5601911, 1448834, 777928, 3375149);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (31, 3, 'Республика Адыгея', 496934, 116770, 96155, 284009);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (32, 3, 'Республика Калмыкия', 267133, 59405, 57332, 150396);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (33, 3, 'Республика Крым', 1934630, 528601, 334148, 1071881);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (34, 3, 'Краснодарский край', 5838273, 1428223, 942478, 3467572);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (35, 3, 'Астраханская область', 960142, 216915, 183761, 559466);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (36, 3, 'Волгоградская область', 2500781, 656952, 332254, 1511575);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (37, 3, 'Ростовская область', 4200729, 1103237, 637735, 2459757);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (38, 3, 'г. Севастополь', 547820, 129830, 74724, 343266);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (39, 4, 'Республика Дагестан', 3182054, 402892, 850457, 1928705);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (40, 4, 'Республика Ингушетия', 509541, 46645, 125194, 337702);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (41, 4, 'Кабардино-Балкарская Республика', 904200, 170944, 193209, 540047);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (42, 4, 'Карачаево-Черкесская Республика', 469865, 97083, 97785, 274997);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (43, 4, 'Республика Северная Осетия – Алания', 687357, 154587, 125874, 406896);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (44, 4, 'Чеченская Республика', 1510824, 164247, 464613, 881964);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (45, 4, 'Ставропольский край', 2907593, 681775, 496086, 1729732);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (46, 5, 'Республика Башкортостан', 4091423, 994702, 735164, 2361557);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (47, 5, 'Республика Марий Эл', 677097, 173260, 125837, 378000);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (48, 5, 'Республика Мордовия', 783552, 223538, 115355, 444659);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (49, 5, 'Республика Татарстан', 4004809, 975639, 735974, 2293196);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (50, 5, 'Удмуртская Республика', 1452914, 366316, 271957, 814641);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (51, 5, 'Чувашская Республика', 1186909, 298297, 227991, 660621);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (52, 5, 'Пермский край', 2532405, 635975, 462828, 1433602);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (53, 5, 'Кировская область', 1153680, 349776, 191848, 612056);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (54, 5, 'Нижегородская область', 3119115, 879849, 472014, 1767252);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (55, 5, 'Оренбургская область', 1862767, 476807, 344417, 1041543);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (56, 5, 'Пензенская область', 1266348, 369708, 195814, 700826);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (57, 5, 'Самарская область', 3172925, 866276, 488808, 1817841);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (58, 5, 'Саратовская область', 2442575, 665070, 359279, 1418226);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (59, 5, 'Ульяновская область', 1196745, 342641, 186154, 667950);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (60, 6, 'Курганская область', 776661, 232607, 134145, 409909);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (61, 6, 'Свердловская область', 4268998, 1069655, 715879, 2483464);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (62, 6, 'Тюменская область', 3823910, 716671, 819486, 2287753);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (63, 6, 'Ханты-Мансийский автономный округ – Югра', 1711480, 282754, 369454, 1059272);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (64, 6, 'Ямало-Ненецкий автономный округ', 510490, 65014, 116640, 328836);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (65, 6, 'Тюменская область без автономных округов', 1601940, 368903, 333392, 899645);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (66, 6, 'Челябинская область', 3431224, 896912, 564910, 1969402);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (67, 7, 'Республика Алтай', 210924, 39595, 56255, 115074);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (68, 7, 'Республика Тыва', 336651, 35793, 110221, 190637);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (69, 7, 'Республика Хакасия', 534795, 123222, 112779, 298794);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (70, 7, 'Алтайский край', 2163693, 603126, 398305, 1162262);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (71, 7, 'Красноярский край', 2856971, 661148, 501565, 1694258);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (72, 7, 'Иркутская область', 2370102, 552583, 467371, 1350148);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (73, 7, 'Кемеровская область – Кузбасс', 2600923, 666837, 452936, 1481150);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (74, 7, 'Новосибирская область', 2797176, 693319, 479397, 1624460);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (75, 7, 'Омская область', 1858798, 483744, 318566, 1056488);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (76, 7, 'Томская область', 1062666, 249144, 187334, 626188);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (77, 8, 'Республика Бурятия', 978588, 196660, 234767, 547161);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (78, 8, 'Республика Саха (Якутия)', 995686, 163004, 239300, 593382);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (79, 8, 'Забайкальский край', 1004125, 210628, 215992, 577505);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (80, 8, 'Камчатский край', 291705, 58108, 56571, 177026);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (81, 8, 'Приморский край', 1845165, 461017, 287197, 1096951);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (82, 8, 'Хабаровский край', 1292944, 296160, 223343, 773441);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (83, 8, 'Амурская область', 766912, 169190, 137587, 460135);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (84, 8, 'Магаданская область', 136085, 27291, 23121, 85673);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (85, 8, 'Сахалинская область', 466609, 111846, 75407, 279356);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (86, 8, 'Еврейская автономная область', 150453, 34422, 28475, 87556);
INSERT INTO stage.subject (id, district_id, name, population, population_over_working_age, population_under_working_age, working_population) VALUES (87, 8, 'Чукотский автономный округ', 47490, 6559, 10618, 30313);

        ");
    }

    public function down(Schema $schema): void
    {
    }
}
