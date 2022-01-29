-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2022 at 07:45 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interview-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `candidate_id` bigint(20) UNSIGNED NOT NULL,
  `email_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OIB` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`candidate_id`, `email_id`, `name`, `surname`, `address`, `city`, `mobile_number`, `status_type`, `OIB`, `created_at`, `updated_at`) VALUES
(1, 'mario@gmail.com', 'Mario', 'Marić', 'Zametska ulica 1', 'Rijeka', '09111122233', 'Student', '123456789', '2022-01-25 22:06:49', '2022-01-25 22:06:49'),
(2, 'marko@gmail.com', 'Marko', 'Slavić', 'Ulica Mate Balote 5', 'Rijeka', '091453723', 'Nezaposlen', '456423573', '2022-01-27 16:31:59', '2022-01-27 16:31:59'),
(3, 'bruno@gmail.com', 'Bruno', 'Ujević', 'Pionirska ulica 58', 'Rijeka', '099785368', 'Student', '4392057349', '2022-01-27 16:34:02', '2022-01-27 16:34:02'),
(4, 'jakov@gmail.com', 'Jakov', 'Jakić', 'Creska ulica 3', 'Rijeka', '098678564', 'Nezaposlen', '789756946', '2022-01-27 16:36:10', '2022-01-27 16:36:10'),
(5, 'ivana@gmail.com', 'Ivana', 'Ivanić', 'Ulica Ante Pilepića 23', 'Rijeka', '0994539284', 'Student', '578305829', '2022-01-27 16:37:34', '2022-01-27 16:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `email_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_employees` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `email_id`, `name`, `address`, `city`, `number_employees`, `type`, `description`, `created_at`, `updated_at`) VALUES
(1, 'erste-banka@gmail.com', 'Erste & Steiermärkische Bank d.d.', 'Ulica grada Vukovara br. 41', 'Zagreb', 324, 'Financije', 'Današnja Erste&Steiermarkische Bank d.d. potječe od nekadašnjih jakih regionalnih banaka – Riječke banke te Bjelovarske, Trgovačke i Čakovečke banke, a pod tim imenom posluje od 1. kolovoza 2003. Danas je to moderna banka koja prema veličini aktive zauzima treće mjesto na tržištu te je dio međunarodnog Erste Groupa, jednog od najvećih pružatelja financijskih usluga u srednjoj i istočnoj Europi. Erste banku drukčijom čine njezini zaposlenici, njihov pristup poslu, inovativnost i briga za klijente. Iz godine u godinu postiže kvalitetne financijske rezultate, kontinuirano ulažući u digitalni razvoj, što omogućava inovativnost i kreativnost u pristupu klijentima. Prateći financijske potrebe građana i financirajući zdrave, isplative projekte poduzetnika i tvrtki koji doprinose rastu zaposlenosti u realnom sektoru, banka adekvatno potiče razvoj gospodarstva u cjelini.', '2022-01-25 21:41:10', '2022-01-29 16:04:34'),
(2, 'addiko-bank@gmail.com', 'Addiko Bank', 'Slavonska avenija 6', 'Zagreb', 400, 'Financije', 'Addiko Grupa sastoji se od Addiko Banke AG, potpuno licencirane matične banke registrirane u Beču u Austriji. Addiko Banka AG izlistana je na bečkoj burzi i regulirana je Austrijskim tijelom za financijska tržišta kao i njenih šest podružnica, koje su registrirane, licencirane i posluju u pet zemalja središnje i jugoistočne Europe: Hrvatska, Slovenija, Bosna i Hercegovina (dvije banke), Srbija i Crna Gora. Addiko Bank d.d. na hrvatskom tržištu posluje od 1996. godine, nudeći financijske proizvode i usluge pravnim osobama, javnim institucijama i građanima. Mreža Addiko banke na dan 20.1.2022. godine obuhvaća 35 poslovnica i 5 mobilnih timova te više od 200 bankomata diljem Hrvatske, a financijske usluge pruža više od 260.000 klijenata', '2022-01-25 21:59:49', '2022-01-28 19:28:55'),
(3, 'ecx@gmail.com', 'ecx.io croatia d.o.o.', 'Kapucinski trg 5', 'Varaždin', 400, 'Informacijske tehnologije', 'We are ecx.io – an IBM company. For more than 22 years we have been working with our customers to identify opportunities in the digital world and to realise their full potential. The passion and motivation that this requires provides us with a common goal – creating a better digital tomorrow.\r\n\r\nSince 2016 we are proud to have been a part of IBM iX, the global agency family of IBM, where we act as one of the leading digital agencies in Europe with more than 350 employees at sites in five different countries.\r\n\r\nWith a focus on digital platforms & ecosystems and strong expertise in digital marketing and e-commerce, we work with innovative concepts and agile processes at the interface of strategy, creativity and technology.', '2022-01-25 22:10:24', '2022-01-28 19:31:31'),
(4, 'transcom@gmail.com', 'Transcom', 'Županijska 21', 'Osijek', 254, 'Administracija', 'Mi smo globalni specijalist za iskustvo korisnika. Pružamo usluge korisničke podrške, prodaje i tehničke podrške putem naše razgranate mreže kontaktnih centara i agenata koji rade od kuće. Naš tim čini 30000 stručnjaka za korisničko iskustvo u 69 kontaktnih centara u 26 zemalja, a pružamo usluge na 33 jezika međunarodnim brandovima u različitim gospodarskim sektorima.', '2022-01-26 13:44:49', '2022-01-26 13:50:21'),
(5, 'maistra@gmail.com', 'Maistra d.d.', 'Obala Vladimira Nazora 6', 'Rovinj', 670, 'Hotelijerstvo', 'MAISTRA d.d. jedna je od vodećih turističkih kompanija u Hrvatskoj. Društvo posluje u sastavu Adris grupe d.d. (u nastavku: Adris) i upravlja turističkim dijelom poslovanja Adrisa, tj. upravlja hotelima, turističkim naseljima i kampovima u međunarodno prepoznatljivim odredištima - Rovinju, Vrsaru, Zagrebu i Dubrovniku. Kupoprodajom udjela i strateškim partnerstvom Adrisa i društva HUP-ZAGREB d.d., Zagreb početkom 2018., stvorene su pretpostavke da Društvo postane najveća nacionalna turistička kompanija.', '2022-01-26 14:01:04', '2022-01-26 14:03:26'),
(6, 'omega@gmail.com', 'Omega software d.o.o.', 'Kamenarka 37', 'Zagreb', 450, 'Informacijske tehnologije', 'Mi u Omegi Software ne pratimo trendove nego ih interpretiramo i stvaramo. Koristimo prednosti novih tehnologija kako bi olakšali svakodnevno poslovanje te u konačnici donijeli pozitivne promjene u radu naših korisnika.\r\n\r\nOmegaše pokreće znatiželja, želja za znanjem i stvaranjem novih ideja. Volimo biti kreativni i stvarati nova tehnološki inovativna rješenja za unapređenje poslovnih procesa.\r\n\r\nViše od 20 godina Omega software d.o.o. predvodnik je Hrvatskog IT-ja, s naglaskom na kvalitetu i inovativnost.\r\n\r\nNaš tim trenutno broji preko 100 stručnjaka iz raznih područja, a iz godine u godinu povećavamo obujam poslovanja te kroz tendenciju rasta želimo naše poslovanje obogatiti najkvalitetnijim zaposlenicima.', '2022-01-27 16:12:07', '2022-01-27 16:25:11');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interviews`
--

CREATE TABLE `interviews` (
  `interview_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interviews`
--

INSERT INTO `interviews` (`interview_id`, `user_id`, `job_id`, `date`, `time`, `type`, `created_at`, `updated_at`) VALUES
(5, 3, 9, '2022-01-27', '09:00:00', 'live', '2022-01-27 16:50:06', '2022-01-27 16:50:06'),
(6, 3, 7, '2022-01-28', '08:00:00', 'online', '2022-01-27 16:52:18', '2022-01-27 16:52:18'),
(7, 3, 20, '2022-02-17', '12:00:00', 'online', '2022-01-27 16:54:11', '2022-01-27 16:54:11'),
(8, 3, 22, '2022-02-15', '13:00:00', 'live', '2022-01-27 16:54:54', '2022-01-27 16:54:54'),
(9, 3, 2, '2022-02-16', '13:00:00', 'online', '2022-01-27 16:56:55', '2022-01-27 16:56:55'),
(10, 8, 1, '2022-01-27', '14:00:00', 'live', '2022-01-27 16:59:07', '2022-01-27 16:59:07'),
(11, 8, 3, '2022-02-08', '08:00:00', 'live', '2022-01-27 17:00:11', '2022-01-27 17:00:11'),
(12, 9, 4, '2022-02-08', '12:00:00', 'live', '2022-01-27 17:01:02', '2022-01-27 17:01:02'),
(13, 11, 2, '2022-01-27', '12:00:00', 'online', '2022-01-27 17:05:49', '2022-01-27 17:05:49'),
(14, 9, 2, '2022-01-27', '13:00:00', 'online', '2022-01-27 17:07:00', '2022-01-27 17:07:00'),
(15, 3, 8, '2022-01-28', '09:00:00', 'live', '2022-01-27 17:22:26', '2022-01-27 17:22:26'),
(16, 3, 5, '2022-01-27', '16:00:00', 'online', '2022-01-27 17:23:41', '2022-01-27 17:23:41');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` int(11) NOT NULL,
  `deadline` date NOT NULL,
  `conditions` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `company_id`, `description`, `position`, `type`, `city`, `salary`, `deadline`, `conditions`, `created_at`, `updated_at`) VALUES
(1, 1, 'PRIDRUŽI NAM SE JER ĆEŠ raditi na instaliranju, konfiguriranju i održavanju storage, SAN i NAS infrastrukture i sve druge tehnologije klasificirane kao tehnologije za pohranu podataka.', 'Projektant - inženjer sistemske podrške (m/ž)', 'Informacijske tehnologije', 'Zagreb', 9500, '2022-02-20', '-Samostalna si, proaktivna i snalažljiva osoba izraženih komunikacijskih vještina, spremna na nove stvari i suradnju s različitim timovima stručnjaka\r\n-Radio/la si barem 2 godine na poslovima IT sistemske podrške\r\n- Informatičkog si, elektrotehničkog ili srodnog usmjerenja\r\n -Voliš se baviti izazovima automatizacije, pratiš trendove u razvoju novih alata i IT praksi\r\n-Dobro poznaješ i služiš se engleskim jezikom\r\n-Odlično poznaješ tehnologije za pohranu podataka (SAN, NAS, DAS…)\r\n -Poznaješ ili si imala/o priliku raditi na neku od tehnologija za pohranu podataka podataka (EMC, HP ili Hitachi)\r\n -Poznaješ vSAN tehnologije za pohranu podataka i imaš iskustvo u izradi shell skripti', '2022-01-25 21:45:21', '2022-01-29 16:00:36'),
(2, 1, 'PRIDRUŽI NAM SE JER ĆEŠ savjetovati klijente i ugovarati proizvode sukladno potrebama klijenata, akvizirati nove klijente kroz sudjelovanje u kampanjama, ispunjavati individualne ciljeve kroz pružanje kvalitetne i brze usluge.', 'Mlađi blagajnik (m/ž/d)', 'Financije', 'Daruvar', 5000, '2022-02-06', '-Samostalna si, pouzdana i proaktivna osoba izraženih komunikacijskih vještina, spremna usvajati nove stvari i izazove\r\n-Ekonomskog ili sličnog si usmjerenja i želiš zaviriti u svijet bankarstva\r\n-Odlično je ako već imaš iskustvo u bankarskim poslovima s građanstvom\r\n-Aktivno pristupaš prodaji, lako ostvaruješ kontakt i imaš sposobnost prepoznavanja potreba klijenata\r\n-Organizacija je tvoja jača strana\r\n-Fleksibilna si i mobilna osoba sklona promjenama\r\n-Dobro poznaješ i služiš se engleskim jezikom\r\n -Aktivno poznaješ rad na osobnom računalu (MS Office)', '2022-01-25 21:49:54', '2022-01-27 16:41:37'),
(3, 1, 'PRIDRUŽI NAM SE JER ĆEŠ raditi na razvoju metodologije i matematičkih modela u jedinoj banci u Hrvatskoj koja primjenjuje napredni pristup izračuna kapitalnih zahtjeva. Primjenjivati napredne statističke metode na velikim bazama podataka.', 'Kvantitativni analitičar (m/ž/d)', 'Financije', 'Zagreb', 7800, '2022-02-27', '-imaš VII. stupanj stručne spreme (VSS) / diplomski studij, smjer: matematika, informatika, računarstvo ili drugo relevantno srodno područje\r\n-imaš iskustvo na poslovima istog zanimanja ili drugog srodnog područja (općenito Data Science područje)\r\n-razumiješ parametre rizika (PD, LGD, EAD) i poznaješ kreditne procese Banke\r\n-poznaješ zakonske regulative iz područja upravljanja kreditnim rizikom\r\n-poznaješ rad u SAS-u i/ili Pythonu i/ili strukturiranim bazama podataka (SQL) i srodnim alatima\r\n-izvrsno poznaješ MS Officea (Excel, PowerPoint, Word)\r\n-imaš izvrsno znanje engleskog jezika u govoru i pismu\r\n-imaš izraženu znatiželju prema podacima, istraživačkoj analizi i uočavanju uzoraka', '2022-01-25 21:51:48', '2022-01-27 16:42:14'),
(4, 1, 'PRIDRUŽI NAM SE JER ĆEŠ raditi na pružanju podrške procesu upravljanja ICT i sigurnosnim rizicima u Banci, upravljati i koordinirati odgovorima na regulatorne zahtjeve u skladu sa propisanim dokumentima i propisima.', 'Specijalist za kibernetsku sigurnost (m/ž/d)', 'Informacijske tehnologije', 'Zagreb', 10000, '2022-03-18', '-imaš VSS društvenog, tehničkog ili prirodoslovnog smjera\r\n-imaš najmanje 3 godine radnog iskustva u području kibernetske sigurnosti / enterprise risk management. Alternativno, najmanje 1 godinu radnog iskustva u području poslovne, risk ili IT analitike u financijskoj industriji\r\n-imaš izuzetne organizacijske sposobnosti, sposobnosti vođenja, planiranja i odlučivanja te komunikacijske vještine\r\n-aktivno poznaješ rad na osobnom računalu –MS Office\r\n-imaš aktivno znanje engleskog jezika u govoru i pismu\r\n-posjeduješ jedan od certifikata npr. CRISC / CISSP / CISA / CISM', '2022-01-25 21:58:08', '2022-01-27 16:42:50'),
(5, 2, 'Javi nam se ako: želiš sudjelovati u svim fazama razvoja softvera, od analize korisničkih zahtjeva do dizajna arhitekture sustava. Želiš postati stručnjak u kodiranju, testiranju te pripremi tehničke i razvojne dokumentacije.', '.NET Software Developer (m/ž)', 'Informacijske tehnologije', 'Zagreb', 8000, '2022-03-03', '-imaš iskustva u razvoju softvera: Middle (5 godine iskustva) / Senior (5 godina iskustva)-odlično govoriš i pišeš engleski jezik-poznaješ .NET, Microsoft Visual Studio i Microsoft Sql Server platforme-imaš razvijene organizacijske i analitičke vještine-u poslu si samostalan/a i odgovoran/a -u timu plivaš kao riba u moru', '2022-01-25 22:02:22', '2022-01-27 16:43:40'),
(6, 3, '-You coach, develop and support multiple cross-functional teams, potentially on a scaled setup\r\n-You recognise and moderate conflicts within the teams and encourage creative input when looking for solutions, as well as, on client side', 'Senior Scrum Master (m/f/d)', 'Informacijske tehnologije', 'Zagreb', 9000, '2022-02-06', '-Ideally you have at least three years’ professional experience as a Scrum Master, ideally in the digital area\r\n-You have completed a university degree (preferably in IT) or have relevant professional experience in the digital media industry\r\n-A scrum master certification (CSM, PSM) is beneficial\r\n-You have a strong character, excellent communication and moderation skills, as well as, the ability to assert yourself\r\n-You demonstrate excellent organisational talent, a structured way of working and good problem-solving skills (team, goals, customer)\r\n-Ideally you have worked with distributed and/or international team\r\n-You are business fluent in English and preferably conversational in German\r\n -A confident manner and the ability to work independently in a team round off your structured approach to work\r\n -You are willing to travel for business purposes\r\n -You have experience with Atlassian Tools (Jira & Confluence)', '2022-01-25 22:13:02', '2022-01-25 22:13:02'),
(7, 3, '-Prototyping as well as developing innovative, complex web development projects are part of your main responsibilities\r\n-You work within interdisciplinary, agile teams with experts for User Experience, User Interface, Backend and Testing', 'Frontend Developer (m/f/d)', 'Informacijske tehnologije', 'Zagreb', 7800, '2022-02-07', '-You can demonstrate at least two years of experience in frontend development and your knowledge of the basics like HTML and modular CSS\r\n-You\'re experienced in the use of JavaScript as well as JavaScript frameworks (like Angular, React, Vue.js)\r\n-Autonomy, team spirit and great willingness to learn are one of your key characteristics\r\n-You have very good English language skills (at least Level B2) and have good German language skills (at least Level B1)\r\n- Ideally, working with Task Runner like GULP, GRUNT or Webpack isn\'t new to you.\r\n-At best you have already knowledge in SCSS/SASS\r\n -Ideally, you have already worked with the tool GIT', '2022-01-25 22:14:39', '2022-01-25 22:14:39'),
(8, 2, 'Želiš raditi na razvoju, održavanju aplikacija i sustava za podršku poslovanja Banke i cijele Addiko Grupe (6 zemalja). Želiš sudjelovati u svim fazama razvoja softvera, od analize korisničkih zahtjeva do dizajna arhitekture sustava.', 'Software Developer (m/ž)', 'Informacijske tehnologije', 'Zagreb', 7600, '2022-02-21', '-Appian ili neka druga low-code platforma\r\n-Microsoft SQL Server\r\n-SCRUM framework\r\n-Microsoft Visual Studio i .NET (C#, ASP.NET, ASP.NET Core, WebAPI, WPF)\r\n-Microsoft Azure Devops', '2022-01-26 13:41:39', '2022-01-27 16:44:21'),
(9, 4, 'Vaš posao obuhvaća cjelokupni životni ciklus zaposlenika u organizaciji, od administrativnih pitanja vezanih uz upravljanje ljudskim resursima, izvještavanja i statistike, do složenih HR tematika, implementacije strateških HR procesa.', 'Human Resources Support Specialist (m/f)', 'Ljudski resursi', 'Pula', 6700, '2022-03-24', '-minimalno 1 godina radnog iskustva u području administracije ljudskih potencijala i izvještavanju\r\n-izvrsne analitičke sposobnosti i rad u Office paketu (sa naglaskom na Excel)\r\n-prednost je poznavanje radnog prava\r\n-razumijevanje općih politika i procedura ljudskih resursa\r\n-izvrsno poznavanje rada na računalu\r\n-B2 razina poznavanja talijanskog i engleskog jezika\r\n-izvrsne verbalne, pismene i interpersonalne komunikacijske vještine, kolegijanost\r\n-temeljitost, sistematičnost, pedantnost i samostalnost u radu\r\n-sustavnost u radu i sposobnost određivanja prioriteta u razdobljima različitog intenziteta rada\r\n-etičnost i sposobnost izgradnje i održavanje kvalitetnih odnosa unutar HR i operativnog tima.', '2022-01-26 13:49:56', '2022-01-26 13:49:56'),
(10, 4, 'Pridruži se timu jednog od najbrže rastućih startupa na svijetu u zajedničkom cilju: pomoći milijunima stanovnika širom svijeta kako bi se kretali u svojim gradovima. Čeka te plaćena obuka za posao i mogućnosti napredovanja!', 'Agent u korisničkoj podršci na slovačkom jeziku (m/ž)', 'Korisnička podrška', 'Zagreb', 5600, '2022-02-06', '-znanje slovačkog jezika na C1 razini (napredni korisnik)\r\n-engleski jezik: razina B2 (za potrebe treninga i razumijevanje materijala za učenje, rada u sustavu i internu komunikaciju)\r\n-osnovno korištenje MS Office paketa, brzina i točnost u tipkanju\r\n-izvrsne komunikacijske i interakcijske vještine\r\n-učinkovita pisana i usmena komunikacija\r\n-samostalnost, motiviranost, organiziranost i otvorenost.', '2022-01-26 13:52:54', '2022-01-26 13:52:54'),
(11, 4, 'Pridruži se našim zaposlenicima na uzbudljivom projektu koji se bavi provjerom osobnih podataka. Komunikacija s korisnicima je putem video poziva te je šansa da nastavite svoju karijeru u okruženju punom podrške i uspjeha!', 'Agent u korisničkoj video podršci na njemačkom jeziku (m/ž)', 'Korisnička podrška', 'Osijek', 6000, '2022-02-04', '-njemački jezik: napredno u pisanju i govoru\r\n-engleski jezik: razina B1 (prednost)\r\n-informatička znanja: osnovno korištenje MS Office paketa\r\n-razvijene komunikacijske i interakcijske vještine\r\n-samostalnost, motiviranost, organiziranost i otvorenost.', '2022-01-26 13:54:50', '2022-01-26 13:54:50'),
(12, 4, 'Pridruži se odličnom timu i radi za internacionalnu banku! Uz managere i Team leadere koji su uvijek tu da ti pomognu, kolega koji su zabavni i puni podrške, razvij svoju karijeru uz Transcom!', 'Administrativni agent u službi za korisnike na francuskom jeziku (m/ž)', 'Korisnička podrška', 'Zagreb', 6700, '2022-02-06', '-francuski jezik: razina C1 u pisanju i govoru (napredni i samostalni korisnik)\r\n-engleski jezik: razina B2 (razumijevanje i praćenje treninga te procedura)\r\n-informatička znanja: osnovno korištenje MS Office paketa, brzina i točnost u tipkanju\r\n-razvijene komunikacijske i interakcijske vještine\r\n-učinkovita pismena i verbalna komunikacija\r\n-samostalnost, motiviranost, organiziranost i otvorenost', '2022-01-26 13:56:30', '2022-01-26 13:56:30'),
(13, 5, 'Za rast i uspjeh možemo zahvaliti našim motiviranim zaposlenicima koji vole raditi ovaj posao. U cilju unapređenja poslovanja, tražimo nove talente.', 'Slastičar (m/ž)', 'Ugostiteljstvo', 'Rovinj', 4500, '2022-02-04', '-KV/SSS slastičar\r\n-radno iskustvo na istim ili sličnim poslovima\r\n-pedantnost, sistematičnost i sklonost timskom radu\r\n-visoka razina odgovornosti u obavljanju radnih zadataka\r\n-prethodno radno iskustvo\r\n-poznavanje stranih jezika', '2022-01-26 14:05:47', '2022-01-26 14:05:47'),
(14, 5, 'Za rast i uspjeh možemo zahvaliti našim motiviranim zaposlenicima koji vole raditi ovaj posao. U cilju unapređenja poslovanja, tražimo nove talente.', 'Radnik u hortikulturi / Vrtlar (m/ž)', 'Ugostiteljstvo', 'Rovinj', 4500, '2022-02-04', '-SSS (vrtlarska ili poljoprivredna strukovna škola ili slično)\r\n-minimalno jedna godina radnog iskustva u struci\r\n-poznavanje minimalno jednog stranog jezika (engleski poželjno)\r\n-poznavanje rada s agrokemikalijama (gnojiva, herbicidi, pesticidi) poželjno položen stručni ispit za upotrebu pesticida\r\n-vozačka dozvola B kategorije', '2022-01-26 14:07:49', '2022-01-26 14:07:49'),
(15, 5, 'Za rast i uspjeh možemo zahvaliti našim motiviranim zaposlenicima koji vole raditi ovaj posao. U cilju unapređenja poslovanja, tražimo nove talente.', 'Konobar (m/ž)', 'Ugostiteljstvo', 'Vrsar', 4500, '2022-02-06', '-KV/SSS ugostiteljska struka\r\n-ljubaznost i gostoljubivost\r\n-sklonost timskom radu\r\n-znanje barem 2 strana jezika (poželjno engleski, njemački, talijanski)\r\n-iskustvo radu na sličnim poslovima u ugostiteljstvu', '2022-01-26 14:09:01', '2022-01-26 14:09:01'),
(16, 5, 'Za rast i uspjeh možemo zahvaliti našim motiviranim zaposlenicima koji vole raditi ovaj posao. U cilju unapređenja poslovanja, tražimo nove talente.', 'Pizza majstor (m/ž)', 'Ugostiteljstvo', 'Vrsar', 5000, '2022-02-23', '-KV/SSS – kvalificirani kuhar ili pizza majstor\r\n-radno iskustvo na istim ili sličnim poslovima\r\n-pedantnost, sistematičnost i sklonost timskom radu\r\n-visoka razina odgovornosti u obavljanju radnih zadataka\r\n-višegodišnje radno iskustvo\r\n-poznavanje stranih jezika', '2022-01-26 14:10:19', '2022-01-26 14:10:19'),
(17, 5, 'Za rast i uspjeh možemo zahvaliti našim motiviranim zaposlenicima koji vole raditi ovaj posao. U cilju unapređenja poslovanja, tražimo nove talente.', 'Servir (m/ž)', 'Ugostiteljstvo', 'Dubrovnik', 5500, '2022-02-21', '-NKV/KV/SSS poželjno ugostiteljskog smjera\r\n-poznavanje min. 1 stranog jezika (poželjno engleski, njemački, talijanski)\r\n- izražena komunikacijske vještine, ljubaznost i gostoljubivost\r\n-sklonost timskom radu', '2022-01-26 14:11:29', '2022-01-26 14:11:29'),
(18, 5, 'Za rast i uspjeh možemo zahvaliti našim motiviranim zaposlenicima koji vole raditi ovaj posao. U cilju unapređenja poslovanja, tražimo nove talente.', 'Sobar / Sobarica', 'Hotelijerstvo', 'Dubrovnik', 4000, '2022-02-23', '-iskustvo rada u Odjelu domaćinstva ili sličnim poslovima\r\n-ljubaznost i gostoljubivost\r\n-pedantnost\r\n-snalažljivost\r\n-samostalnost\r\n-proaktivnost\r\n-sklonost timskom radu\r\n-konstantno ulaganje i razvijanje u području rada', '2022-01-26 14:13:03', '2022-01-26 14:13:03'),
(19, 6, '-Rad u IoT timu na razvoju komponenti IoT platforme\r\n- Izrada, održavanje i optimizacija platformskih mikro servisa\r\n-Projektni rad – definiranje arhitekture rješenja, implementacije, testiranja\r\n-Integracije platforme s vanjskim sustavima i platformama', 'Senior razvojni programski inženjer za IOT platformu (m/ž)', 'Informacijske tehnologije', 'Zagreb', 6700, '2022-02-23', '-5+ godina iskustva u razvoju na Spring frameworku\r\n-Razumijevanje ciklusa u razvoju softvera\r\n-Dobro poznavanje rada relacijskih baza; iskustvo u radu sa NoSQL bazama\r\n-Iskustva razvoja aplikacija s komunikacijom kroz REST API, WebSocket, Message Queue\r\n-Dobro snalaženje s version control alatima (Git)\r\n-Dobro snalaženje u radu na Linux OS-u', '2022-01-27 16:15:15', '2022-01-27 16:15:15'),
(20, 6, 'Radno mjesto IOT managera omogućit će vam da budete dio nadahnute i pozitivne priče od samih početaka razvoja novih sustava. Ostvarite svoje ciljeve u osobnom i profesionalnom razvoju, radom u zanimljivom, dinamičnom i nadasve pozitivnom okruženju.', 'IOT program manager (m/ž)', 'Informacijske tehnologije', 'Zagreb', 6700, '2022-02-25', '-5+ godina iskustva u prodaji i/ili vođenju projekata i/ili poslovnoj analizi\r\n-Poznavanje IoT tržišta\r\n-Prezentacijske vještine\r\n-Samostalnost\r\n-Proaktivnost\r\n-PM certifikat\r\n-Poznavanje procesa razvoja softwarea', '2022-01-27 16:21:49', '2022-01-27 16:21:49'),
(21, 6, 'Razvoj i održavanje rješenja za enterprise klijente i javni sektor - od razvoja vlastitog ERP-a, ECM-a i DMS-a, do cjelovitih rješenja „po mjeri\"\r\nKorištenje Microsoft stacka NET Framework / .NET Core stacku (C#, ASP.NET, SQL server).', 'Razvojni programski inženjer - mid/senior (m/ž)', 'Informacijske tehnologije', 'Zagreb', 6700, '2022-02-25', '-Visoka ili viša stručna sprema / Prvostupnik tehničkog smjera\r\n-Minimalno 3 godine iskustva na istim ili sličnim poslovima (Mid), 8 godina iskustva na istim ili sličnim poslovima (Senior)\r\n-Komunikacijske vještine prilagođene timskom radu kao i volja za napredovanjem u znanju\r\n-Smisao za rješavanje problema, upornost i odgovornost u radu\r\n-Spremnost na usvajanje znanja iz poslovne domene\r\n-Izražene analitičke sposobnosti\r\n-Savjesnost, inovativnost i odgovornost u radu\r\n-Pozitivan stav i spremnost na timski rad\r\n-Temeljitost i preciznost u izvršavanju zadataka uz poštivanje zadanih rokova\r\n-Spremnost na stručno usavršavanje i certificiranje\r\n-Organiziranost i samoinicijativa', '2022-01-27 16:24:49', '2022-01-27 16:24:49'),
(22, 6, 'Rad u IoT timu na razvoju komponenti IoT platforme i upravljačkih aplikacija. Izrada, održavanje i optimizacija korisničkih aplikacija baziranih na REST API i WebSocket komunikaciji.', 'Front-end razvojni programski inženjer (m/ž)', 'Informacijske tehnologije', 'Zagreb', 8000, '2022-03-30', '-3+ godine iskustva u razvoju frontend aplikacija\r\n-Razumijevanje ciklusa u razvoju softvera\r\n-Dobro poznavanje frontend tehnologija (HTML/CSS/Javascript, JSON, REST, ES6+)\r\n-Iskustvo rada s ReactJS frameworkom\r\n-Dobro snalaženje s version control alatima (Git)', '2022-01-27 16:26:41', '2022-01-27 16:26:41');

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `application_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`application_id`, `user_id`, `job_id`, `message`, `status`, `created_at`, `updated_at`) VALUES
(5, 3, 9, 'Poštovana gospođo Pešto,\r\n\r\nVjerujem da me moja poslovna iskustva kao i karakterne osobine čine izvrsnim kandidatom za poziciju ljudskih resursa u vašoj tvrtki.\r\nUpravo sam završio magisterij ekonomije, smjer Tržište i marketing na Ekonomskom fakultetu u Sarajevu. Tokom studija bio sam predsjednik studentskog marketinškog društva Budući lideri u gospodarstvu.\r\nNisam tipičan novopečeni magistar. Dio studija proveo sam u SAD-u, tokom studija radio sam kao agent za radio oglase, također sam se bavio prodajom pretplate za poznate dnevne novine.\r\n\r\nHvala vam za vaše vrijeme.', 'Čekanje', '2022-01-27 16:50:06', '2022-01-27 16:50:06'),
(6, 3, 7, 'Poštovana gospođo Pešto,\r\n\r\nVjerujem da me moja poslovna iskustva kao i karakterne osobine čine izvrsnim kandidatom za poziciju front-end programeru Vašoj tvrtki.\r\nUpravo sam završio magisterij ekonomije, smjer Tržište i marketing na Ekonomskom fakultetu u Sarajevu. Tokom studija bio sam predsjednik studentskog marketinškog društva Budući lideri u gospodarstvu.\r\nNisam tipičan novopečeni magistar. Dio studija proveo sam u SAD-u, tokom studija radio sam kao front-end programer, također sam se bavio prodajom pretplate za poznate dnevne novine.\r\n\r\nHvala vam za vaše vrijeme.', 'Čekanje', '2022-01-27 16:52:18', '2022-01-27 16:52:18'),
(7, 3, 20, 'Poštovana gospođo Pešto,\r\n\r\nVjerujem da me moja poslovna iskustva kao i karakterne osobine čine izvrsnim kandidatom za poziciju IOT manager u vašoj tvrtki.\r\nUpravo sam završio magisterij ekonomije, smjer Tržište i marketing na Ekonomskom fakultetu u Sarajevu. Tokom studija bio sam predsjednik studentskog marketinškog društva Budući lideri u gospodarstvu.\r\nNisam tipičan novopečeni magistar. Dio studija proveo sam u SAD-u, tokom studija radio sam kao IOT programer, također sam se bavio prodajom pretplate za poznate dnevne novine.\r\n\r\nHvala vam za vaše vrijeme.', 'Čekanje', '2022-01-27 16:54:11', '2022-01-27 16:54:11'),
(8, 3, 22, 'Poštovana gospođo Pešto,\r\n\r\nVjerujem da me moja poslovna iskustva kao i karakterne osobine čine izvrsnim kandidatom za poziciju front-end programer u vašoj tvrtki.\r\nUpravo sam završio magisterij ekonomije, smjer Tržište i marketing na Ekonomskom fakultetu u Sarajevu. Tokom studija bio sam predsjednik studentskog marketinškog društva Budući lideri u gospodarstvu.\r\nNisam tipičan novopečeni magistar. Dio studija proveo sam u SAD-u, tokom studija radio sam kao front-end programer, također sam se bavio prodajom pretplate za poznate dnevne novine.\r\n\r\nHvala vam za vaše vrijeme.', 'Čekanje', '2022-01-27 16:54:54', '2022-01-27 16:54:54'),
(9, 3, 2, 'Poštovana gospođo Pešto,\r\n\r\nVjerujem da me moja poslovna iskustva kao i karakterne osobine čine izvrsnim kandidatom za poziciju mlađi blagajnik u vašoj tvrtki.\r\nUpravo sam završio magisterij ekonomije, smjer Tržište i marketing na Ekonomskom fakultetu u Sarajevu. Tokom studija bio sam predsjednik studentskog marketinškog društva Budući lideri u gospodarstvu.\r\nNisam tipičan novopečeni magistar. Dio studija proveo sam u SAD-u, tokom studija radio sam kao mlađi blagajnik, također sam se bavio prodajom pretplate za poznate dnevne novine.\r\n\r\nHvala vam za vaše vrijeme.', 'Prihvaćeno', '2022-01-27 16:56:55', '2022-01-29 16:05:20'),
(10, 8, 1, 'Poštovana gospođo Pešto,\r\n\r\nVjerujem da me moja poslovna iskustva kao i karakterne osobine čine izvrsnim kandidatom za poziciju projektant sistemske podrške u vašoj tvrtki.\r\nUpravo sam završio magisterij ekonomije, smjer Tržište i marketing na Ekonomskom fakultetu u Sarajevu. Tokom studija bio sam predsjednik studentskog marketinškog društva Budući lideri u gospodarstvu.\r\nNisam tipičan novopečeni magistar. Dio studija proveo sam u SAD-u, tokom studija radio sam kao projektant sistemske podrške, također sam se bavio prodajom pretplate za poznate dnevne novine.\r\n\r\nHvala vam za vaše vrijeme.', 'Čekanje', '2022-01-27 16:59:07', '2022-01-27 16:59:07'),
(11, 8, 3, 'Poštovana gospođo Pešto,\r\n\r\nVjerujem da me moja poslovna iskustva kao i karakterne osobine čine izvrsnim kandidatom za poziciju kvantitativni analitičar u vašoj tvrtki.\r\nUpravo sam završio magisterij ekonomije, smjer Tržište i marketing na Ekonomskom fakultetu u Sarajevu. Tokom studija bio sam predsjednik studentskog marketinškog društva Budući lideri u gospodarstvu.\r\nNisam tipičan novopečeni magistar. Dio studija proveo sam u SAD-u, tokom studija radio sam kao kvantitativni analitičar, također sam se bavio prodajom pretplate za poznate dnevne novine.\r\n\r\nHvala vam za vaše vrijeme.', 'Čekanje', '2022-01-27 17:00:11', '2022-01-27 17:00:11'),
(12, 9, 4, 'Poštovana gospođo Pešto,\r\n\r\nVjerujem da me moja poslovna iskustva kao i karakterne osobine čine izvrsnim kandidatom za poziciju specijalist za kibernetsku sigurnost u vašoj tvrtki.\r\nUpravo sam završio magisterij ekonomije, smjer Tržište i marketing na Ekonomskom fakultetu u Sarajevu. Tokom studija bio sam predsjednik studentskog marketinškog društva Budući lideri u gospodarstvu.\r\nNisam tipičan novopečeni magistar. Dio studija proveo sam u SAD-u, tokom studija radio sam kao mlađi blagajnik, također sam se bavio prodajom pretplate za poznate dnevne novine.\r\n\r\nHvala vam za vaše vrijeme.', 'Čekanje', '2022-01-27 17:01:02', '2022-01-27 17:01:02'),
(13, 11, 2, 'Poštovana gospođo Pešto,\r\n\r\nVjerujem da me moja poslovna iskustva kao i karakterne osobine čine izvrsnim kandidatom za poziciju mlađi blagajnik u vašoj tvrtki.\r\nUpravo sam završio magisterij ekonomije, smjer Tržište i marketing na Ekonomskom fakultetu u Sarajevu. Tokom studija bila sam predsjednik studentskog marketinškog društva Budući lideri u gospodarstvu.\r\nNisam tipičan novopečeni magistar. Dio studija provela sam u SAD-u, tokom studija radila sam kao mlađi blagajnik, također sam se bavila prodajom pretplate za poznate dnevne novine.\r\n\r\nHvala vam za vaše vrijeme.', 'Čekanje', '2022-01-27 17:05:49', '2022-01-27 17:05:49'),
(14, 9, 2, 'Poštovana gospođo Pešto,\r\n\r\nVjerujem da me moja poslovna iskustva kao i karakterne osobine čine izvrsnim kandidatom za poziciju mlađi blagajnik u vašoj tvrtki.\r\nUpravo sam završio magisterij ekonomije, smjer Tržište i marketing na Ekonomskom fakultetu u Sarajevu. Tokom studija bio sam predsjednik studentskog marketinškog društva Budući lideri u gospodarstvu.\r\nNisam tipičan novopečeni magistar. Dio studija proveo sam u SAD-u, tokom studija radio sam kao mlađi blagajnik, također sam se bavio prodajom pretplate za poznate dnevne novine.\r\n\r\nHvala vam za vaše vrijeme.', 'Odbijeno', '2022-01-27 17:07:00', '2022-01-27 20:05:49'),
(15, 3, 8, 'Poštovana gospođo Pešto, Vjerujem da me moja poslovna iskustva kao i karakterne osobine čine izvrsnim kandidatom za poziciju software developer u vašoj tvrtki. Upravo sam završio magisterij ekonomije, smjer Tržište i marketing na Ekonomskom fakultetu u Sarajevu. Tokom studija bio sam predsjednik studentskog marketinškog društva Budući lideri u gospodarstvu. Nisam tipičan novopečeni magistar. Dio studija proveo sam u SAD-u, tokom studija radio sam kao software, također sam se bavio prodajom pretplate za poznate dnevne novine. Hvala vam za vaše vrijeme.', 'Čekanje', '2022-01-27 17:22:26', '2022-01-27 17:22:26'),
(16, 3, 5, 'Poštovana gospođo Pešto, Vjerujem da me moja poslovna iskustva kao i karakterne osobine čine izvrsnim kandidatom za poziciju .NET software developer u vašoj tvrtki. Upravo sam završio magisterij ekonomije, smjer Tržište i marketing na Ekonomskom fakultetu u Sarajevu. Tokom studija bio sam predsjednik studentskog marketinškog društva Budući lideri u gospodarstvu. Nisam tipičan novopečeni magistar. Dio studija proveo sam u SAD-u, tokom studija radio sam kao .NET software developer, također sam se bavio prodajom pretplate za poznate dnevne novine. Hvala vam za vaše vrijeme.', 'Čekanje', '2022-01-27 17:23:41', '2022-01-27 17:23:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_12_06_091525_create_sessions_table', 1),
(7, '2021_12_10_154410_create_companies_table', 1),
(8, '2021_12_10_155645_create_jobs_table', 1),
(9, '2021_12_10_160918_create_interviews_table', 1),
(10, '2021_12_10_162250_create_job_applications_table', 1),
(11, '2021_12_18_110531_create_candidates_table', 1),
(12, '2022_01_04_190948_create_notifications_table', 1),
(13, '2022_01_15_141648_add_message_to_job_applications', 1),
(14, '2022_01_19_203947_add_description_to_companies', 1),
(15, '2022_01_27_215252_alter_jobs_description_varchar_to_text', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('1f32aadc-d86a-49ee-8f7d-a68ce30364ff', 'App\\Notifications\\Acception', 'App\\Models\\User', 9, '{\"status\":\"Odbijeno\",\"position\":\"Mla\\u0111i blagajnik (m\\/\\u017e\\/d)\",\"city\":\"Daruvar\",\"company\":\"Erste & Steierm\\u00e4rkische Bank d.d.\"}', '2022-01-27 20:09:34', '2022-01-27 20:05:50', '2022-01-27 20:09:34'),
('250065a4-ebf4-4867-be59-4e74989642da', 'App\\Notifications\\NewApplication', 'App\\Models\\User', 5, '{\"name\":\"Mario\",\"surname\":\"Mari\\u0107\",\"city\":\"Rijeka\"}', NULL, '2022-01-27 16:50:06', '2022-01-27 16:50:06'),
('2fb413ed-0c8e-4903-8184-d609ce9b6298', 'App\\Notifications\\NewApplication', 'App\\Models\\User', 1, '{\"name\":\"Ivana\",\"surname\":\"Ivani\\u0107\",\"city\":\"Rijeka\"}', NULL, '2022-01-27 17:05:49', '2022-01-27 17:05:49'),
('435b2ca3-a451-4410-84b5-869e14424e0c', 'App\\Notifications\\NewApplication', 'App\\Models\\User', 7, '{\"name\":\"Mario\",\"surname\":\"Mari\\u0107\",\"city\":\"Rijeka\"}', NULL, '2022-01-27 16:54:54', '2022-01-27 16:54:54'),
('4482e9df-4c91-4a49-b9ac-e39554a0384a', 'App\\Notifications\\NewApplication', 'App\\Models\\User', 1, '{\"name\":\"Mario\",\"surname\":\"Mari\\u0107\",\"city\":\"Rijeka\"}', '2022-01-27 17:01:56', '2022-01-26 07:18:47', '2022-01-27 17:01:56'),
('4a7a9f45-27b3-4058-a84d-f1570b37838f', 'App\\Notifications\\NewApplication', 'App\\Models\\User', 1, '{\"name\":\"Mario\",\"surname\":\"Mari\\u0107\",\"city\":\"Rijeka\"}', '2022-01-27 17:02:04', '2022-01-27 15:58:58', '2022-01-27 17:02:04'),
('4be75559-d166-4567-a52f-5d56b550e462', 'App\\Notifications\\NewApplication', 'App\\Models\\User', 6, '{\"name\":\"Mario\",\"surname\":\"Mari\\u0107\",\"city\":\"Rijeka\"}', '2022-01-29 17:43:59', '2022-01-29 15:50:42', '2022-01-29 17:43:59'),
('5326ffff-e9b6-4c90-aea4-83b873990f9d', 'App\\Notifications\\Acception', 'App\\Models\\User', 3, '{\"status\":\"Prihva\\u0107eno\",\"position\":\"Mla\\u0111i blagajnik (m\\/\\u017e\\/d)\",\"city\":\"Daruvar\",\"company\":\"Erste & Steierm\\u00e4rkische Bank d.d.\"}', '2022-01-29 16:11:28', '2022-01-29 16:05:20', '2022-01-29 16:11:28'),
('8499bbb5-77b3-4bed-a695-c547d7f95fad', 'App\\Notifications\\NewApplication', 'App\\Models\\User', 4, '{\"name\":\"Mario\",\"surname\":\"Mari\\u0107\",\"city\":\"Rijeka\"}', NULL, '2022-01-26 14:52:39', '2022-01-26 14:52:39'),
('9f8a0092-7afd-4de1-a4e0-6a78b8b084b8', 'App\\Notifications\\NewApplication', 'App\\Models\\User', 1, '{\"name\":\"Bruno\",\"surname\":\"Ujevi\\u0107\",\"city\":\"Rijeka\"}', NULL, '2022-01-27 17:07:00', '2022-01-27 17:07:00'),
('a4ace945-4ae3-462e-83be-bf480fd8da33', 'App\\Notifications\\NewApplication', 'App\\Models\\User', 1, '{\"name\":\"Bruno\",\"surname\":\"Ujevi\\u0107\",\"city\":\"Rijeka\"}', NULL, '2022-01-27 17:01:02', '2022-01-27 17:01:02'),
('a8cbb168-6de3-4313-860d-11bbec3fb68b', 'App\\Notifications\\NewApplication', 'App\\Models\\User', 1, '{\"name\":\"Mario\",\"surname\":\"Mari\\u0107\",\"city\":\"Rijeka\"}', '2022-01-27 20:04:54', '2022-01-27 16:56:55', '2022-01-27 20:04:54'),
('b1cf792c-a8e0-4def-ba80-1efb87b1e26c', 'App\\Notifications\\NewApplication', 'App\\Models\\User', 1, '{\"name\":\"Marko\",\"surname\":\"Slavi\\u0107\",\"city\":\"Rijeka\"}', '2022-01-29 16:10:40', '2022-01-27 16:59:07', '2022-01-29 16:10:40'),
('b7e1ec3e-817e-4890-ae36-2f0a82bc60d7', 'App\\Notifications\\NewApplication', 'App\\Models\\User', 7, '{\"name\":\"Mario\",\"surname\":\"Mari\\u0107\",\"city\":\"Rijeka\"}', NULL, '2022-01-27 16:54:11', '2022-01-27 16:54:11'),
('c779139b-89ce-45b0-a785-5c8f541dd117', 'App\\Notifications\\NewApplication', 'App\\Models\\User', 2, '{\"name\":\"Mario\",\"surname\":\"Mari\\u0107\",\"city\":\"Rijeka\"}', NULL, '2022-01-27 17:22:26', '2022-01-27 17:22:26'),
('d0dbcf64-d2b5-44f4-9172-65b036117a2c', 'App\\Notifications\\NewApplication', 'App\\Models\\User', 1, '{\"name\":\"Marko\",\"surname\":\"Slavi\\u0107\",\"city\":\"Rijeka\"}', NULL, '2022-01-27 17:00:11', '2022-01-27 17:00:11'),
('d6bc45d9-2453-4556-8269-a4b1fbdbdb27', 'App\\Notifications\\NewApplication', 'App\\Models\\User', 1, '{\"name\":\"Mario\",\"surname\":\"Mari\\u0107\",\"city\":\"Rijeka\"}', '2022-01-27 20:04:32', '2022-01-27 16:00:54', '2022-01-27 20:04:32'),
('eaba83b1-1ec8-4aa0-9d85-25ffcffbd6d8', 'App\\Notifications\\NewApplication', 'App\\Models\\User', 2, '{\"name\":\"Mario\",\"surname\":\"Mari\\u0107\",\"city\":\"Rijeka\"}', NULL, '2022-01-27 17:23:41', '2022-01-27 17:23:41'),
('ec79126c-7985-48dd-be17-4a5493cde820', 'App\\Notifications\\NewApplication', 'App\\Models\\User', 4, '{\"name\":\"Mario\",\"surname\":\"Mari\\u0107\",\"city\":\"Rijeka\"}', NULL, '2022-01-27 16:52:18', '2022-01-27 16:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('rYUo3BJ8HWVjQpcL5lBJNbbcF38ImCAcHWZPUSot', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTXp1eEFDaWhUTnRiVWkxSk9yeWRsdXdIOUZYalNPUzFFcHY1ZHVvaiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1643481845);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_company` tinyint(1) NOT NULL DEFAULT 0,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `is_company`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'erste-banka@gmail.com', NULL, '$2y$10$G8EbfP2ObCOemEi1NUsrde34rpdqpZqfb1sJnXnmLOabA4KCLjrSC', NULL, NULL, 1, NULL, '2022-01-25 21:41:10', '2022-01-25 21:41:10'),
(2, 'addiko-bank@gmail.com', NULL, '$2y$10$sPuMvqCk8jy.wEWsFBn9keB2857QdFTEi67dChRSqWacaghnfDD0C', NULL, NULL, 1, NULL, '2022-01-25 21:59:49', '2022-01-25 21:59:49'),
(3, 'mario@gmail.com', NULL, '$2y$10$fglZ1xgg.P1rdqA9d7Or.OEAcD5vAVuCjxQ4Fmwti.XyuJbOWR14.', NULL, NULL, 0, NULL, '2022-01-25 22:06:49', '2022-01-25 22:06:49'),
(4, 'ecx@gmail.com', NULL, '$2y$10$0g.H86/Rnb6P4lkiOuSxVutvGveufoUufDnCi9XjeVZF.UJhJDzSe', NULL, NULL, 1, NULL, '2022-01-25 22:10:24', '2022-01-25 22:10:24'),
(5, 'transcom@gmail.com', NULL, '$2y$10$0jKupRAxnI71Gx489s05uubrvN/aUju3ltVWgt4.P6/aQ8ui6NZY2', NULL, NULL, 1, NULL, '2022-01-26 13:44:49', '2022-01-26 13:44:49'),
(6, 'maistra@gmail.com', NULL, '$2y$10$gpRt8r9U0E2ZOsXeaEvk6uMSw8h0IXHHZeLZqs1BlRJMxpC3ySCDK', NULL, NULL, 1, NULL, '2022-01-26 14:01:04', '2022-01-26 14:01:04'),
(7, 'omega@gmail.com', NULL, '$2y$10$zWFvgcU8FAdHoEJr2E4T1Oq.Z2Ja/GW43S5mmCzdVaeSZo/sYaWMi', NULL, NULL, 1, NULL, '2022-01-27 16:12:07', '2022-01-27 16:12:07'),
(8, 'marko@gmail.com', NULL, '$2y$10$eU5oXERUo98KDLzibMhjOOE0sVJgNoQ1HEj6KZutOotnpvtCLfgjO', NULL, NULL, 0, NULL, '2022-01-27 16:31:59', '2022-01-27 16:31:59'),
(9, 'bruno@gmail.com', NULL, '$2y$10$g6J9JX2s1yLBFXMfkRHGQu6f5UtDbI/mIZiEh3bCUnz9vCwiYdIlG', NULL, NULL, 0, NULL, '2022-01-27 16:34:02', '2022-01-27 16:34:02'),
(10, 'jakov@gmail.com', NULL, '$2y$10$PuPBKkGbRfQlFs9QwFQ97uJqMhzph8Qj3vnRGMCQ1i1lCJj/sFCse', NULL, NULL, 0, NULL, '2022-01-27 16:36:10', '2022-01-27 16:36:10'),
(11, 'ivana@gmail.com', NULL, '$2y$10$0fUezMvlAHgspBoMSU7tCuwDnUhFvblZvQCVcVsDYiuj.ahX1Cot.', NULL, NULL, 0, NULL, '2022-01-27 16:37:34', '2022-01-27 16:37:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`candidate_id`),
  ADD UNIQUE KEY `candidates_oib_unique` (`OIB`),
  ADD KEY `candidates_email_id_foreign` (`email_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `companies_email_id_foreign` (`email_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `interviews`
--
ALTER TABLE `interviews`
  ADD PRIMARY KEY (`interview_id`),
  ADD KEY `interviews_job_id_foreign` (`job_id`),
  ADD KEY `interviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `jobs_company_id_foreign` (`company_id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `job_applications_job_id_foreign` (`job_id`),
  ADD KEY `job_applications_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `candidate_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interviews`
--
ALTER TABLE `interviews`
  MODIFY `interview_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `application_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidates`
--
ALTER TABLE `candidates`
  ADD CONSTRAINT `candidates_email_id_foreign` FOREIGN KEY (`email_id`) REFERENCES `users` (`email`) ON DELETE CASCADE;

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_email_id_foreign` FOREIGN KEY (`email_id`) REFERENCES `users` (`email`) ON DELETE CASCADE;

--
-- Constraints for table `interviews`
--
ALTER TABLE `interviews`
  ADD CONSTRAINT `interviews_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `interviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`) ON DELETE CASCADE;

--
-- Constraints for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD CONSTRAINT `job_applications_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
