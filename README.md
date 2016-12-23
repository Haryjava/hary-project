 + _   _  __          _ _ _                                         _                                              
+ | | (_)/ _|        (_) (_)                                       | |                                             
+ | |_ _| |_ ___  ___ _| |_ _ __  _   ___  ____      _____  _ __ __| |_ __  _ __ ___  ___ ___   ___ ___  _ __ ___  
+ | __| |  _/ _ \/ __| | | | '_ \| | | \ \/ /\ \ /\ / / _ \| '__/ _` | '_ \| '__/ _ \/ __/ __| / __/ _ \| '_ ` _ \ 
+ | |_| | || (_) \__ \ | | | | | | |_| |>  < _\ V  V / (_) | | | (_| | |_) | | |  __/\__ \__ \| (_| (_) | | | | | |
+ \__|_|_| \___/|___/_|_|_|_| |_|\__,_/_/\_(_)\_/\_/ \___/|_|  \__,_| .__/|_|  \___||___/___(_)___\___/|_| |_| |_|
                                                                   | |                                           
                                                                   |_|                                           


# hary-project <tifosilinux.wordpress.com>
- Petunjuk Penggunaan/ HOW TO/ Guidance
- Semua kode sumber bebas di gunakan
- Kode sumber sangat powerfull karena mekanisme hit di proses secara background didalam environment linux. Karena web service atau aplikasi semacam php memiliki limitasi timeout
- Kode sumber dapat ditingkatkan karena masih memiliki kelemahan dimana traffic belum dapat terhitung ke google analytic (script js/ javascript)

- Gunakan direktori regresilinier di dalam phpscript sebagai kode sumber
- Gunakan berkas-berkas di dalam direktori shellscript untuk di daftarkan pada cronjob dengan aturan sbb:
*/1 * * * *     generate_links.sh
* * * * *       switch.sh
9 14,23 * * *   warehouse.sh
1 */[custom] * * *      hit_cron.sh

# hary-project <tifosilinux.wordpress.com>
