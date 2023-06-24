<footer class="main-footer">
    <strong>
        <?php
            date_default_timezone_set("Asia/Jakarta");
            $namaHari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
            $indeksHari = date('w'); // Mendapatkan indeks hari dalam seminggu
            $tanggal = date('d-m-Y');
            $jam = date('H:i:s');
        ?>
        {{ $namaHari[$indeksHari] }}, {{ $tanggal }} || <span id="jam" style="font-size:24"></span>
        <script type="text/javascript">
            window.onload = function () {
                jam();
            }
            function jam() {
                var e = document.getElementById('jam'),
                    d = new Date(),
                    h, m, s;
                h = d.getHours();
                m = set(d.getMinutes());
                s = set(d.getSeconds());
                e.innerHTML = h + ':' + m + ':' + s;
                setTimeout('jam()', 1000);
            }
            function set(e) {
                e = e < 10 ? '0' + e : e;
                return e;
            }
        </script>
    </strong>
</footer>