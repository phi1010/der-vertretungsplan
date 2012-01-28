<div id="footer">
    <div class="padding">
        <p>
            Zuletzt aktualisiert: 
            <?php
            $wtage = array("Sonntag",
                "Montag",
                "Dienstag",
                "Mittwoch",
                "Donnerstag",
                "Freitag",
                "Samstag");
            echo $wtage[date("w", time())] . ", " . date('j.m.Y H:i', time());
            ?>
        </p>
        <br/>
        <p>Dies ist eine inoffizielle Seite, die Inhalte automatisch von der <a href="http://asg-er.de">Homepage des Albert-Schweitzer-Gymnasiums Erlangen</a> abruft, diese Seite wird nicht von der Schule betrieben.</p>
        <p>Alle Informationen werden ohne Gewähr zur Verfügung gestellt, für Fehler dieses Skripts kann keine Haftung übernommen werden.</p>
        <p>Aus Datenschutzgründen wurden die Namen der Lehrkräfte auf 4 Buchstaben gekürzt.</p>
        <p>Hinweis der Schule: Gültig ist der aktuelle Aushang in der Schule. Der Onlineplan kann unter Umständen den Stand vom Vortag darstellen.</p>
        <p>Haftungshinweis: Für den Inhalt extern verlinkter Seiten kann keine Haftung übernommen werden, es sind ausschließlich deren jeweilige Betreiber verantwortlich. Dies gilt insbesondere für Links, die automatisch von der Homepage der Schule übernommen würden.</p>
        <p>Beim Besuch dieser Website werden IP-Adresse, Bildschirmgröße, Browserversion und ähnliche Informationen erfasst, um eine öffentliche Statistik zu erstellen.</p>
    </div>
</div>