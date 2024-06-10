<!DOCTYPE html>
<html lang="it">

<?php require_once('utilities/cookie_check.php'); ?>

<head>
    <?php include('head_items.html'); ?>

    <!-- Title -->
    <title>Chi Siamo - SAW | Cabinets</title>

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="css/aboutus_styles.css">
</head>

<body>
<?php include('header.php'); ?>

<main class="w3-container w3-center w3-padding-64">
    <div class="w3-container w3-center w3-margin-top">
        <h1>Scopri chi siamo e contattaci.</h1>
    </div>

    <div class="about-content w3-container w3-padding-32">
        <h2>Chi siamo</h2>
        <p>
            Fondata nel 2024, ci impegniamo a offrire ai nostri clienti non solo cabinati impeccabilmente realizzati, ma vere e proprie opere d'arte
            che riflettono la nostra passione per il legno e l'artigianato.
            <br>
            La nostra missione è trasformare il legno grezzo in cabinati straordinari, superando le aspettative dei nostri clienti in termini di design, funzionalità
            e durabilità. Con una combinazione di tecniche tradizionali e tecnologie moderne, ogni pezzo di legno viene lavorato con cura e attenzione per i dettagli,
            garantendo la massima qualità in ogni fase del processo di produzione.
            <br>
            Guidati dalla nostra passione per il legno e dalla nostra dedizione all'eccellenza artigianale, ci impegniamo a creare cabinati unici che si distinguono
            per la loro bellezza e autenticità. Il nostro team di artigiani altamente qualificati porta avanti la tradizione dell'artigianato del legno con maestria
            e creatività, creando cabinati che sono veri e propri capolavori da ammirare e godere per generazioni.
            <br>
            Siamo grati per l'opportunità di condividere la nostra passione con voi e di creare cabinati che arricchiscono le vostre case e le vostre vite.
            Siamo qui per voi, pronti a trasformare i vostri sogni in realtà con i nostri cabinati artigianali di alta qualità.
        </p>
        <img src="photos/aboutus_photos/aboutus_team.jpeg" alt="Foto di Squadra">
    
        <h2>Il nostro legno</h2>
        <p>
            Nel cuore della nostra azienda di cabinati, il processo di produzione inizia con la cura e l'attenzione rivolta alla materia prima fondamentale: il legno.
            Scegliamo con cura le migliori essenze legnose, provenienti da foreste gestite in modo sostenibile, per garantire la qualità e la durabilità dei nostri cabinati.
            Una volta selezionato il legno più adatto al nostro progetto, passiamo al processo di taglio.
            <br>
            Il taglio del legno è una fase cruciale nella nostra produzione, in cui ogni pezzo viene lavorato con precisione e maestria artigianale.
            Utilizzando tecnologie all'avanguardia e un approccio artigianale, i nostri esperti tagliatori creano con cura ogni componente del cabinato, seguendo rigorosamente le
            specifiche e le dimensioni richieste dal progetto.
            <br>
            Il nostro impegno per l'eccellenza artigianale e la qualità del legno si riflette in ogni fase del processo di taglio, dal momento in cui la sega entra in contatto con
            il legno grezzo fino alla creazione di componenti finemente lavorati pronti per la fase successiva della produzione.
            Con una combinazione di esperienza, tecnologia e passione per il lavoro del legno, ci impegniamo a offrire ai nostri clienti cabinati di alta qualità che rispondano
            alle loro esigenze estetiche e funzionali, garantendo al contempo un impatto ambientale positivo e sostenibile.
        </p>
        <img src="photos/aboutus_photos/aboutus_woodcutting.jpeg" alt="Taglio del legno">

        <h2>Il Raspberry Pi 5</h2>
        <p>
            Il Raspberry Pi è un microcomputer a basso costo, sviluppato dalla Raspberry Pi Foundation, che ha rivoluzionato il mondo dell'elettronica e dell'istruzione. 
            Con dimensioni compatte e un prezzo accessibile, il Raspberry Pi è utilizzato in una vasta gamma di progetti, dall'apprendimento della programmazione alla realizzazione
            di sistemi di automazione domestica. La sua versatilità e potenza lo rendono uno strumento ideale per hobbisti, studenti e professionisti che desiderano esplorare il
            mondo della tecnologia e dell'innovazione. Con il supporto di una vasta comunità online, il Raspberry Pi continua a essere una fonte inesauribile di ispirazione per
            chiunque desideri sperimentare e creare soluzioni tecnologiche creative.
            <br>
            Il Raspberry Pi 5 rappresenta l'ultima evoluzione della celebre serie di microcomputer sviluppata dalla Raspberry Pi Foundation. Dotato di un processore più potente,
            una maggiore capacità di memoria e opzioni di connettività avanzate, il Raspberry Pi 5 offre prestazioni superiori rispetto ai suoi predecessori. Questo modello è 
            ideale per applicazioni più esigenti, come lo sviluppo di software avanzato, la realizzazione di server domestici, e progetti di intelligenza artificiale. 
            Con il supporto per USB 3.0, Gigabit Ethernet e una GPU migliorata, il Raspberry Pi 5 è uno strumento versatile e potente per hobbisti, educatori e professionisti. 
            La sua compatibilità con una vasta gamma di accessori e moduli espande ulteriormente le sue possibilità, rendendolo una scelta eccellente per chiunque voglia esplorare 
            il futuro della tecnologia informatica.
        </p>
        <img src="photos/aboutus_photos/aboutus_raspberry_pi.png" alt="Raspberry Pi 5">
    
    </div>

    <button id="contact_us" class="w3-btn w3-green" style="font-size: 24px;">Contatta il team!</button>
    <div id="contacts" style="display: none;">
        <h3>0123456789</h3>
        <h3>info@example.com</h3>
    </div>

    <!-- Team div -->
    <div style="margin-top: 50px;" class="team-div w3-container w3-padding-64 w3-card">
        <h2 class="w3-center">Membri del Team</h2>
        <div class="w3-row-padding w3-grayscale w3-center">
            <div class="w3-col l3 m6 team-member">
                <img src="photos/team_member.png" alt="Emanuele Valente" class="w3-circle" style="width:50%">
                <h3>Emanuele Valente</h3>
                <p>CEO & Founder</p>
                <div class="member_contacts">
                    <span>+39 348 123 4567</span> <br>
                    <span>randomuser123@example.com</span>
                </div>
            </div>
            <div class="w3-col l3 m6 team-member">
                <img src="photos/team_member.png" alt="Mario Rossi" class="w3-circle" style="width:50%">
                <h3>Mario Rossi</h3>
                <p>Head of Marketing</p>
                <div class="member_contacts">
                    <span>+44 7911 654321</span> <br>
                    <span>test.email456@domain.org</span>
                </div>
            </div>
            <div class="w3-col l3 m6 team-member">
                <img src="photos/team_member.png" alt="Luigi Verdi" class="w3-circle" style="width:50%">
                <h3>Luigi Verdi</h3>
                <p>CTO</p>
                <div class="member_contacts">
                    <span>+1 202 555 0198</span> <br>
                    <span>fakeemail789@website.net</span>
                </div>
            </div>
            <div class="w3-col l3 m6 team-member">
                <img src="photos/team_member.png" alt="Luca Bianchi" class="w3-circle" style="width:50%">
                <h3>Luca Bianchi</h3>
                <p>Head of Sales</p>
                <div class="member_contacts">
                    <span>+39 320 987 6543</span> <br>
                    <span>randomuser456@example.com</span>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    $(document).ready(function() {
        $("#contact_us").on('click', function() {
            $("#contacts").slideToggle();
        });

        $(".team-member").click(function() {
            $(this).find(".member_contacts").slideToggle();
        });
    });
</script>

<?php include('footer.html'); ?>

</body>
</html>
