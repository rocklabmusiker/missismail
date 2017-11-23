@extends('layouts.main_scripts')

@section('header')
	@include('layouts.header')
@endsection 

@section('content')
 
    <div class="container-fluid recht">
        <div class="row content_wrapper">
            <div class="col-lg-12">
                <h3>Impressum</h3>

                <h4>Angaben gemäß § 5 TMG:</h4>
                <p>Daniel Wagner</p>
                <p>Missismail</p>
                <p>Saxtorfer Weg 14b</p>
                <p>24340 Eckernförde</p>

                <h4>Kontakt:</h4>
                <p>Telefon: +4915122275739</p>
                <p>E-Mail: danielwagnerpost@gmail.com</p>
                <p>Website: www.missismail.com</p>

                <p>St.-Nr.:</p>
                <p>USt-ID: </p>

                <h4>Aufsichtsbehörde:</h4>
                <p>Stadtverwaltung Eckernförde</p>
                <p>Rathausmarkt 4-6, 24340 Eckernförde</p>
                <p>http://www.eckernfoerde.de/</p>

                <br>
                <hr>
                <h4>Bildnachweise</h4>
                <p><img src="{{ asset('assets/images/desktop/bild1-min.JPG') }}" alt="bild1"></p>
                <span>happy family with shopping bags © LIGHTFIELD STUDIOS - https://de.fotolia.com</span>
                <p><img src="{{ asset('assets/images/desktop/bild2-min.JPG') }}" alt="bild2"></p>
                <span>Pretty woman choosing dresses in mall © zinkevych - https://de.fotolia.com</span>
                <p><img src="{{ asset('assets/images/desktop/bild3-min.JPG') }}" alt="bild3"></p>
                <span>Happy young couple with laptop sitting on floor at home © Africa Studio - https://de.fotolia.com</span>
                

                <hr>
                <h4>Streitschlichtung</h4>
                <p>Die Europäische Kommission stellt eine Plattform zur Online-Streitbeilegung (OS) bereit: <a href="http://ec.europa.eu/consumers/odr">http://ec.europa.eu/consumers/odr</a></p>
                <p>Unsere E-Mail-Adresse finden Sie oben im Impressum.</p>
                <p>Wir sind nicht bereit oder verpflichtet, an Streitbeilegungsverfahren vor einer Verbraucherschlichtungsstelle teilzunehmen.</p>

                <h4>Haftung für Inhalte</h4>
                <p>Als Diensteanbieter sind wir gemäß § 7 Abs.1 TMG für eigene Inhalte auf diesen Seiten nach den allgemeinen Gesetzen verantwortlich. Nach §§ 8 bis 10 TMG sind wir als Diensteanbieter jedoch nicht verpflichtet, übermittelte oder gespeicherte fremde Informationen zu überwachen oder nach Umständen zu forschen, die auf eine rechtswidrige Tätigkeit hinweisen.</p>
                <p>Verpflichtungen zur Entfernung oder Sperrung der Nutzung von Informationen nach den allgemeinen Gesetzen bleiben hiervon unberührt. Eine diesbezügliche Haftung ist jedoch erst ab dem Zeitpunkt der Kenntnis einer konkreten Rechtsverletzung möglich. Bei Bekanntwerden von entsprechenden Rechtsverletzungen werden wir diese Inhalte umgehend entfernen.</p>

                <h4>Haftung für Links</h4>
                <p>Unser Angebot enthält Links zu externen Webseiten Dritter, auf deren Inhalte wir keinen Einfluss haben. Deshalb können wir für diese fremden Inhalte auch keine Gewähr übernehmen. Für die Inhalte der verlinkten Seiten ist stets der jeweilige Anbieter oder Betreiber der Seiten verantwortlich. Die verlinkten Seiten wurden zum Zeitpunkt der Verlinkung auf mögliche Rechtsverstöße überprüft. Rechtswidrige Inhalte waren zum Zeitpunkt der Verlinkung nicht erkennbar.</p>
                <p>Eine permanente inhaltliche Kontrolle der verlinkten Seiten ist jedoch ohne konkrete Anhaltspunkte einer Rechtsverletzung nicht zumutbar. Bei Bekanntwerden von Rechtsverletzungen werden wir derartige Links umgehend entfernen.</p>

                <h4>Urheberrecht</h4>
                <p>Die durch die Seitenbetreiber erstellten Inhalte und Werke auf diesen Seiten unterliegen dem deutschen Urheberrecht. Die Vervielfältigung, Bearbeitung, Verbreitung und jede Art der Verwertung außerhalb der Grenzen des Urheberrechtes bedürfen der schriftlichen Zustimmung des jeweiligen Autors bzw. Erstellers. Downloads und Kopien dieser Seite sind nur für den privaten, nicht kommerziellen Gebrauch gestattet.</p>
                <p>Soweit die Inhalte auf dieser Seite nicht vom Betreiber erstellt wurden, werden die Urheberrechte Dritter beachtet. Insbesondere werden Inhalte Dritter als solche gekennzeichnet. Sollten Sie trotzdem auf eine Urheberrechtsverletzung aufmerksam werden, bitten wir um einen entsprechenden Hinweis. Bei Bekanntwerden von Rechtsverletzungen werden wir derartige Inhalte umgehend entfernen.</p>
                <p>Quelle: <a href="https://www.e-recht24.de">eRecht24</a></p>
            </div>
        </div>
    </div>
    	 
@endsection

@section('footer')
	@include('layouts.footer')
@endsection