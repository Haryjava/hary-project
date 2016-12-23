# hary-project
# Petunjuk Penggunaan/ HOW TO/ Guidance

- Gunakan direktori regresilinier di dalam phpscript sebagai kode sumber
- Gunakan berkas-berkas di dalam direktori shellscript untuk di daftarkan pada cronjob dengan aturan sbb:
*/1 * * * *     generate_links.sh
* * * * *       switch.sh
9 14,23 * * *   warehouse.sh
1 */[custom] * * *      hit_cron.sh
