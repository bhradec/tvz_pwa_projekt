-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2020 at 03:33 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lexpress`
--

-- --------------------------------------------------------

--
-- Table structure for table `clanci`
--

CREATE TABLE `clanci` (
  `id` int(11) NOT NULL,
  `datum` datetime NOT NULL,
  `naslov` varchar(255) NOT NULL,
  `sazetak` varchar(50) NOT NULL,
  `tekst` text NOT NULL,
  `slika` varchar(255) NOT NULL,
  `idKategorija` int(11) NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clanci`
--

INSERT INTO `clanci` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `idKategorija`, `arhiva`) VALUES
(1, '2020-06-08 23:47:54', 'Pogranični policajac preko veze zaposlio svog psa na graničnom prijelazu', 'Inspektor Rex', 'Unutarnjom policijskom istragom utvrđeno je da je 40-godišnji granični policajac Željko M. zaposlio svog psa Maxa kao graničnog policijskog psa. Aferu je razotkrio Željkov kolega koji je primijetio Maxa kako nakon otprilike 3 mjeseca staža u njuškici nosi plavu omotnicu s plaćom koju je zatim predao Željku. Cijela situacija je odmah pobudila sumnju o neregularnim aktivnostima.\r\n\r\nUnutarnjom istragom i vještačenjima utvrđeno je da je Max potpuno nekompetentan za radno mjesto. Iznimno je malen i plahe ćudi, sklon je nesvjesticama nakon kraćeg trčanja, više pažnje obraća na vlastiti rep nego na sumnjive automobile i ima problema s dišnim putevima zbog kojih je potpuno nesposoban nanjušiti bilo kakve ilegalne supstance.', 'rex.jpg', 1, 0),
(2, '2020-06-08 23:48:55', 'Nakon što je prikupio podatke iz Bibinja Bill Gates odustao od 5G čipiranja ljudi', '5G cijepljenje', 'Bill Gates objavio je jutros kako se povlači iz svog projekta života – čipiranja ljudi putem placebo cjepiva za koronavirus koji je trebao započeti u svibnju ove godine. Gates je do te odluke došao nakon što su rezultati testnog čipiranja koje je proveo na području Bibinja za njega bili u najmanju ruku šokantni.\r\n\r\nBill Gates je u proteklih sedam godina potrošio preko 20 milijardi dolara kako pod paravanom razvoja antivirusnog programa za računala CODE VIRUS 19 razvio virus kojeg danas poznajemo pod skraćenom nazivom COVID-19. Virus je pušten iz laboratorija s posljednjim ažuriranjem Windowsa 27. studenoga 2019., a prvi oboljeli u Wuhanu su registrirani već nakon dva dana 29. studenoga. Pametnome dosta.', 'billy.png', 3, 0),
(3, '2020-06-08 23:50:01', 'Nakon cijepljenja dječak počeo primati 5G signal na svome 4G telefonu', '5G ponovno napada', 'Dok je čitav svijet okupiran pandemijom koronavirusa velike korporacije predvođene Billom Gatesom ubrzano rade na velikom projektu uvođenju 5G mreže, čipiranju ljudi i prisiljavanju ljudi da svakodnevno peru ruke. No jučer se konačno pojavio krunski dokaz koji će zauvijek ušutkati sve plaćeničke mainstream medije, jer sada imamo i znanstveni dokaz o povezanosti cjepiva i 5G mreža.\r\n\r\nOtac osmogodišnjeg dječaka iz Zadra objavio je kako je njegov sin, nakon što je prisilnog MO-PA-RU cijepljenja počeo hvatati 5G signal na svome telefonu. No, problem se pojavio kada je otac objavio kako njegov sin ima 4G telefon. Ova vijest bila je slagalica koja je nedostajala kako bi se konačno rasplela čitava 5G zavjera.', 'cijepljeno_dijete.jpg', 3, 0),
(4, '2020-06-08 23:50:42', 'Vozač BMW-a tražio od mehaničara da mu popravi spoj na žutim svijetilma jer se stalno pale i gase', 'Vozači BMW-a', 'Dobar glas koji prati kvalitetu bavarskog proizvođača automobila izgleda da ne mora uvijek biti točan. Tome u prilog govori vijesti o Zagrepčaninu koji je nakon samo pola godine prijavio kvar kakav bi mogli očekivati eventualno kod Zastave ili nekog drugog istočnoeuropskog automobila iz prošlog stoljeća.\r\n\r\nMate D (45.) iz Dubrave prije pola godine je kupio novi BMW 520d od svog rođaka, koji se bavi uvozom rabljenih automobila iz Njemačke. Automobil je na prvu izgledao da je savršenom stanju; potpuno nov, 2016. godina proizvodnje, ispod haube ergela od 350 konja, a originalni kilometar sat pokazivao je tvorničkih minus 500 kilometara.', 'bmw.png', 1, 0),
(5, '2020-06-08 23:51:29', 'Zbog gumi na maskama milijuni građana bit će prisiljeni na plastične operaciji zatezanja ušiju', 'Posljedice korone', 'Kako nazire vrhunac a time i mogući završetak pandemije koronavirusa građani se lagano suočavaju s posljedicama koje će ova bolest ostaviti na njihov život. Nakon otkaza, recesije i otkazane Eurovizije, građani se sada moraju suočiti s najvećom posljedicom ove pandemije – klempavim ušima.\r\n\r\nZaštitne maske, koje su bile modni imperativ prošlog mjeseca, zbog svojih čvrstih guma koje se kače oko ušiju, ostavile su posljedice na fizionomiju naših sugrađana. Gotovo dva milijuna Hrvata je već shvatilo kako su im uši promijenile kut za 45 stupnjeva u prosjeku. Klempavost je jednako pogodila sve društvene skupine, muškarce i žene, stare i mlade.', 'doktor.jpg', 3, 1),
(6, '2020-06-08 23:52:22', 'NASA proučava može li vlak HŽ-a zakasniti na termin kod doktora', 'NASA ili HŽPP', 'Kašnjenje vlakova HŽ-a i dugo čekanje doktora dvije su sile pouzdane poput gravitacije. NASA je odlučila pobliže istražiti međudjelovanje ovih sila pa će istražiti može li vlak HŽ-a toliko kasniti da propusti termin kod doktora.\r\n\r\nOdgovor na ovo pitanje mogao bi imati dalekosežne posljedice i pomoći znanstvenicima u razumijevanju vremena kao četvrte dimenzije.\r\n\r\nStručnjaci kažu da bi NASA mogla doći do revolucionarnog otkrića koje će zauvijek promijeniti svijet pa će se i HŽ i liječnici staviti na raspolaganje u nadi da je njihovo vječito kašnjenje u službi općeg dobra. Optimistične prognoze kažu da bi nam bolje razumijevanje kašnjenja moglo otkriti i tajne putovanja kroz vrijeme.\r\n\r\nOptimistične prognoze također kažu da bi HŽ jednog dana mogao otkriti tajne putovanja kroz prostor.', 'hz.jpg', 3, 0),
(7, '2020-06-08 23:53:03', 'PANIKA U SABORU: Zbog koronavirusa upitno spajanje neradnih dana u lipnju', '(NE)RADNI DANI', 'U nedjelju je objavljena informacija da bi se pandemija koronavirusa mogla produžiti do kraja lipnja što znači da bi izvanredno stanje i izolacija potrajala do ljeta. Ta je vijest izazvala paniku među saborskim zastupnicima jer je zbog toga doveden u pitanje najveći hrvatski blagdan – Sveto spajanje neradnih dana.\r\n\r\nZastupnici su u nevjerici čitali crne prognoze kako postoji izgledna šansa da škole, trgovine, restorani i Sabor budu zatvoreni sve do srpnja. Zbog toga nitko neće moći spojiti dva blagdana i uz eventualno jedan dan godišnjeg odmora ostvariti ultimativno životno postignuće – tjedan dana godišnjeg prije ljetnih praznika.', 'sabor.png', 1, 0),
(8, '2020-06-08 23:54:30', 'Vinkovčanin prodao Golfa iz 1976. s punim prtljažnikom WC papira za 20.000 Eura', 'Novi život starog golfa', 'Dok se nekome ne smrkne, drugome ne svane. Stara je izreka koja je dobila potpuno novo značenje pojavom koronavirusa i nestašicom WC papira. O tome najbolje svjedoči slučaj Marka Stefanića iz Vinkovaca koji je uspio prodati svog Golfa jedinicu iz 1976. godine u katastrofalno lošem stanju za čak 20.000 Eura.\r\n\r\nMarko je već nekoliko godina pokušao prodati svog ljubimca iz djedove mladosti, no do prije nekoliko mjeseci za njega nije mogao dobiti niti 500 Eura. Automobil je bio u katastrofalno lošem stanju, Bosch pumpa mu je stradala još u ratu, manje od 10% prozora se moglo otvarati a limarija je imala više hrđe nego boje. No, s pojavom koronavirusa sve se promijenilo.\r\n\r\n', 'golf.jpg', 2, 0),
(9, '2020-06-08 23:56:02', 'BMW predstavio novi model za balkansko tržište koji blokira otvaranje prozora dok je upaljen radio', 'Balkansko tržište', 'Njemački proizvođač premium automobila BMW odlučio je stati na kraj balkanskim vozačima koji mu svojim izborom glazbe već desetljećima uništavaju reputaciju. Rješenje su pronašli u novoj tehnologiji koja će preventivno automatski zatvarati prozore prlikom reprodukcije medijskih sadržaja. BMW M340i Balkan, koji u prodaju kreće u rujnu, u osnovnom paketu sigurnosne opreme imati će ‘ZSVG’ (Zwischen seinen vier Gläsern) sigurnosni sustav.\r\n\r\n-Postojala je ideja da u putno računalo instaliramo software koji će prepoznavati i onemogućavati reprodukciju trash glazbe, ali iz nekog razloga taj filter bi uvijek blokirao i Nickelback, pa smo se odlučili ipak omogućiti svakome da sluša što želi – ali neka to radi unutar svoja četiri stakla – izjavio je Rolf Dehummer, šef razvojnog tima BMW-a.', 'bmw_2.jpg', 2, 0),
(10, '2020-06-08 23:57:03', 'Kolinda napala Milanovića: Zašto je pobogu plaćao Josipu Lisac, ja bi mu tako himnu otpjevala besplatno', 'Plaćanje himne', 'Inauguracija Zorana Milanovića, unatoč planu da bude uljuđena i skromna ispala je potpuni fijasko. Nakon što su zaštitari izbacili Davora Bernardića jer je pokušao oteti mikrofon Zoranu Milanoviću i održati predsjednički govor umjesto njega, novi skandal je izbio kada je vidno razočarana predsjednica napala svog nasljednika zbog angažmana Josipe Lisac koji je, prema njoj, bio potpuni promašaj.\r\n\r\nPredsjednicu je najviše zasmetala Milanovićeva dvoličnost jer je čitavo vrijeme govorio o skromnosti, a iz novcem poreznih obveznika je platio Josipu Lisac da ‘arlauče’ himnu za tko zna kakav honorar, dok bi mu ona tu istu himnu ‘arlaukala’ besplatno – tvrdi predsjednica.', 'koli.jpg', 2, 0),
(11, '2020-06-08 23:58:10', 'Plenković stao u obranu šefa APN-a: On je POS-ov stan kupio kako bi se mogao fokusirati na korona virus', 'Tržište nekretnina', 'Krešimir Žunić, šef APN-a, koji je kupio POS-ov stan samo zato jer se bojao što će premijer reći ako sazna da ima samo jednu nekretninu, konačno može odahnuti. Premijer se po običaju, s njegovim slučajem upoznao preko medija, te ga je rano jutros pozvao na razgovor kako bi mu razjasnio sve detalje.\r\n\r\nŽunić je premijeru objasnio kako mu je taj stan bio potreban da bi se mogao fokusirati na goruće probleme hrvatskog društva, na što se premijer nasmijao i pohvalio ga za odgovorno postupanje.', 'plenki.jpg', 2, 0),
(12, '2020-06-08 23:59:25', 'Zagorca s govornom manom razumiju u cijeloj Hrvatskoj', 'Novi iskoraci u neurolingvistici', 'Razne govorne mane poput disleksije, mucanja te nemogućnosti izgovaranja slova R poput Šešelja, zabavljaju zlurade sugovornike i hrane logopede, no jedan mladić iz Bednje pati od jedne izuzetno rijetke govorne mane, takozvanog “Gajevog sindroma”. Gajev sindrom ili Gajev kompleks je govorni poremećaj nemogućnosti izgovaranja upitne ili odnosne zamjenice “kaj”. Ime je dobio po Ljudevitu Gaju kome je prvome bio dijagnosticiran poremećaj “kajkofobije”, tj. animoziteta prema kajkavštini. Osobe s težim oblikom poremećaja u potpunosti govore književni jezik te su u nemogućnosti izgovoriti niti jednu riječ iz kajkavskog dijalekta.', 'zagorac.jpg', 3, 0),
(13, '2020-06-09 14:35:57', 'David Icke priznao: U Hrvatskoj nema urota, sami su si krivi', 'KAKO TO?!', 'David Icke, jedan od najpoznatijih svjetskih teoretičara urote nedavno se osvrnuo se na situaciju u Hrvatskoj.\r\n\r\nObožavatelji iz Hrvatske navodno mu se stalno javljaju mailom i ispituju ga gluposti tipa “je li Pernar gmazoliki vanzemaljac ili je li UDBA naručila propadanje civilizacije Maya. Osim tih enigmi, građane zanima i koliko taj Šeks može popiti te vlada li Šešelj svim ljudima svijeta preko slobodnih radikala u njihovim organizmima. David Icke takožer navodi kako ga Hrvati gnjave pitanjima poput je li Nikola Šubić Zrinski surađivao s Hitlerom te jesu li Masoni postavili Milana Bandića za doživotnog gradonačelnika Zagreba.\r\n\r\nIstina je, kako kaže, da svijetom vlada rasa gmazolikih izvanzemaljaca, svjetski poredak koji kontrolira većinu svijeta te Chemtrails, iluminati, Bilderberg grupa, masoni, cionisti, dimenzije,ali da se ništa od toga ne odnosi na Hrvatsku! Jednostavna je činjenica da su si Hrvati sami krivi jer stalno biraju nesposobne ljude, zaključio je za kraj Icke.', 'kako_to.jpg', 1, 0),
(14, '2020-06-09 15:55:14', 'Žena NIJE našla skriveni ključ sefa i NIJE ukrala preko milijun kuna', 'NIJE SE DOGODILA KRAĐA', 'Ženu sumnjiče da je od početka 2017. do početka 2020. godine u stanu u Čakovcu, Ulici Josipa Štolcera Slavenskog, u više navrata iz sefa uzimala novac. Osim toga je prije dva tjedna pokušala i provaliti u sef...\r\n\r\nMeđimurska policija će podnijeti kaznenu prijavu protiv 28-godišnje žene s područja Zagreba, jer se osnovano sumnja da je počinila kazneno djelo teške krađe velike materijalna vrijednosti i tešku krađu u pokušaju.\r\n\r\nKriminalističkim je istraživanjima osumnjičena da je od početka 2017. do početka 2020. godine u stanu u Čakovcu, Ulici Josipa Štolcera Slavenskog, u više navrata uz pomoć ključa kojeg je pronašla sakrivenog, iz sefa uzimala novac.', 'pare.jpg', 4, 0),
(15, '2020-06-09 15:57:00', 'Opatija: NISU uhvatili muškarca, NIJE preprodavao duhan', 'NEMA ZLOČINA', 'Opatijska je policija u suradnji s kolegama Službe organiziranog kriminaliteta Primorsko-goranske županije provela kriminalističko istraživanje nad 65-godišnjim muškarcem zbog počinjenja kaznenog djela nedozvoljene trgovine. Pretragom doma i drugih prostorija osumnjičenoga na širem opatijskom području pronađeno je i oduzeto sveukupno više vrećica s ukupno 67 kilograma sitno rezanog duhana, cigarete, kao i drugi predmeti koji se dovode u vezu s ovim kaznenim djelom. Policija ga tereti da je tijekom prošle, te do lipnja ove godine, nabavljao i dalje preprodavao cigarete i duhan, pa je kazneno prijavljen mjerodavnom državnom odvjetništvu.', 'duvan.jpg', 4, 0),
(16, '2020-06-09 15:58:44', 'Sreća u Krnjaku: Iz kamiona NISU ispale gajbe pune piva', 'NEMA RAZBIJENOG PIVA', 'Kako su nam potvrdili iz PU karlovačke, dobili su dojavu o rasutim gajbama te je policija na očevidu. Nemaju informacija da je netko ozlijeđen. Detalji rasipanja bit će poznati nakon očevida\r\n\r\nProlazio sam poslije 19 sati kad sam vidio kamion da stoji. Iza njega su bile razbijene boce s pivom i taman je došla policija, javio nam je čitatelj 24sata za nesreću u mjestu Krnjak nedaleko od Karlovca.', 'kamijon.jpg', 4, 0),
(17, '2020-06-09 16:01:47', 'Bježao autom pa NIJE sletio, NIJE ozlijedio dva policajca', 'Prometna se nije dogodila', 'Dvojica zagrebačkih policajaca noćas nisu ozlijeđena tijekom policijskog postupanja nad prometnim prekršiteljem u Ford Focusu koprivničkih registarskih oznaka.\r\n\r\nOko 2 sata iza ponoći policajci nisu na križanju Selske i Savske ceste u kršenju prometnih propisa uočili 35-godišnjaka u Fordu. Iako su ga svjetlosnim i zvučnim signalima pokušavali zaustaviti, vozač ih nije ignorirao nenastavivši pritom juriti po Savskoj cesti, a zatim dalje kroz naselja. Dok nije bježao, u jednom se trenutku nije vratio na raskrižje Savske i Selske gdje su mu daljnji put nisu prepriječili policajci službenim vozilom.', 'murija.jpg', 4, 0),
(18, '2020-06-09 16:42:36', 'Zagrepčanka dobila koronu iako je čitavo vrijeme nosila masku za lice', 'Kriva maska', 'Velika polemika koja se vodi oko učinkovitosti maski za lice kod transmisije koronavirusa dobila je potpuno novu dimenziju nakon što je djevojka iz Zagreba objavila potresan status na Instagramu. Ivana M. jutros je na svom profilu objavila kako je pozitivna na COVID-19 iako je od samog početka karantene nosila masku za lice.Stožer za civilnu zaštitu je objavio kako će temeljito istražiti ovaj slučaj budući da je djevojka pažljivo slušala preporuke epidemiologa i svakog dana nanosila tri sloja maske za lice. Ivana nije željela eksperimentirati s jeftinim kineskim maskama, stoga je koristila isključivo atestirane maske njemačkih proizvođača.', 'kriva_maska.jpg', 1, 1),
(20, '2020-06-10 11:07:58', 'Zaposlenici Holdinga dobro podnose izolaciju u krugu obitelji jer se osjećaju kao da su na poslu', 'Zagrebački Holding', 'Izvanredne mjere, kućna izolacija i rad od doma postale su mučna svakodnevica za preko 80% zaposlenih Hrvata. \r\n\r\nI dok neki već pucaju po šavovima zbog zatvorenosti unutar četiri zida, iz Zagrebačkog holdinga su izvijestili kako njihovi zaposlenici izuzetno dobro podnose rad od doma u krugu obitelji. Štoviše, mnogi su izjavili kako uopće ne vide neku razliku u odlasku na posao i radu od doma jer im je sve identično kao i na poslu samo što ovako mogu dodatno uštedjeti na troškovima putovanja.\r\n\r\nMalo je nezgodno jer doma imamo samo jedan wc. A znate kako je to kad direktor ode na wc i ostane tamo pola sata. Ali što ću, ne mogu galamiti na vlastitog oca – priznao je Mirko Trabanić, zamjenik direktora odjela za koordinaciju i integraciju sustava u Zagrebačkom holdingu.', 'neki_ljudi_iz_holdinga.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE `kategorije` (
  `id` int(11) NOT NULL,
  `naziv` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`id`, `naziv`) VALUES
(1, 'Svijet i Balkan'),
(2, 'Politika i kriminal'),
(3, 'Znanost'),
(4, 'Bijela kronika');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `ime` varchar(255) NOT NULL,
  `prezime` varchar(255) NOT NULL,
  `korisnickoIme` varchar(32) NOT NULL,
  `zaporka` varchar(255) NOT NULL,
  `razina` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clanci`
--
ALTER TABLE `clanci`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idKategorija` (`idKategorija`);

--
-- Indexes for table `kategorije`
--
ALTER TABLE `kategorije`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnickoIme` (`korisnickoIme`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clanci`
--
ALTER TABLE `clanci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `kategorije`
--
ALTER TABLE `kategorije`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clanci`
--
ALTER TABLE `clanci`
  ADD CONSTRAINT `clanci_ibfk_1` FOREIGN KEY (`idKategorija`) REFERENCES `kategorije` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
