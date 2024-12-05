<div class="col-sm-9 col-xs-12 content pt-3 pl-0">
    <div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">
        <?php if ($this->session->flashdata('flash')) : ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <p><strong><i class="fa fa-info"></i> <?= $this->session->flashdata('flash'); ?></strong></p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif ?>

        <div class="row border-bottom mb-4">
            <div class="col-sm-8 pt-2">
                <h6 class="mb-4 bc-header"><?= $title ?></h6>
            </div>
        </div>
        <!-- <div>
            <a href="javascript:void(0)" onclick="generatePDF()" class="btn btn-danger mb-3"><i class="fa fa-print"></i> Cetak</a>
        </div> -->
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>jenis kelamin</th>
                        <th>Alamat</th>
                        <th>Telp</th>
                        <th>Reset Password</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($guru as $gr) : ?>
                        <tr>
                            <td scope="row"><?= $i++ ?></td>
                            <td><?= $gr['nama_guru']; ?></td>
                            <td><?= $gr['jekel']; ?></td>
                            <td><?= $gr['alamat']; ?></td>
                            <td><?= $gr['telp']; ?></td>
                            <td>
                                <a href="<?= base_url() ?>data/reset_gpassword?id_user=<?= $gr['id_user']; ?>"
                                    type="button"
                                    class="btn btn-theme btn-round"
                                    onclick='return confirm("Yakin Ingin Reset Password Guru?");'>Reset Password</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<!-- Required JavaScript -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<script>
   function generatePDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    const pageWidth = doc.internal.pageSize.getWidth();
    const pageHeight = doc.internal.pageSize.getHeight();
    
    // Header
    doc.setFontSize(16);
    doc.setFont('helvetica', 'bold');
    doc.text('Attin Bimbel', pageWidth/2, 20, { align: 'center' });
    
    // Line under header
    doc.setLineWidth(1);
    doc.line(15, 30, pageWidth-15, 30);
    
    // Title
    doc.setFontSize(14);
    doc.text('LAPORAN DATA GURU', pageWidth/2, 45, { align: 'center' });
    
    // Table settings
    const margin = 15;
    const tableTop = 55;
    const colWidth = (pageWidth - 2 * margin) / 5;
    const rowHeight = 10;
    
    // Draw table grid
    function drawTableGrid(startY, rowCount) {
        // Vertical lines
        for (let i = 0; i <= 5; i++) {
            doc.line(margin + (colWidth * i), startY, 
                    margin + (colWidth * i), startY + rowHeight * rowCount);
        }
        // Horizontal lines
        for (let i = 0; i <= rowCount; i++) {
            doc.line(margin, startY + (rowHeight * i), 
                    pageWidth - margin, startY + (rowHeight * i));
        }
    }
    
    // Headers
    const headers = ['No', 'Nama', 'Jenis Kelamin', 'Alamat', 'Telp'];
    doc.setFontSize(12);
    doc.setFont('helvetica', 'bold');
    
    // Draw header row
    drawTableGrid(tableTop, 1);
    headers.forEach((header, i) => {
        doc.text(header, 
                margin + (colWidth * i) + (colWidth/2), 
                tableTop + 7, 
                { align: 'center' });
    });
    
    // Content
    doc.setFont('helvetica', 'normal');
    let y = tableTop + rowHeight;
    const table = document.getElementById('example');
    const rows = table.getElementsByTagName('tr');
    
    // Calculate content height
    const contentRows = Array.from(rows).slice(1);
    drawTableGrid(y, contentRows.length);
    
    contentRows.forEach((row, index) => {
        const cells = row.getElementsByTagName('td');
        const rowY = y + (rowHeight * index) + 7;
        
        // Content alignment
        doc.text((index + 1).toString(), 
                margin + (colWidth/2), rowY, 
                { align: 'center' });
        doc.text(cells[1].textContent, 
                margin + colWidth + (colWidth/2), rowY, 
                { align: 'center' });
        doc.text(cells[2].textContent, 
                margin + (colWidth*2) + (colWidth/2), rowY, 
                { align: 'center' });
        doc.text(cells[3].textContent, 
                margin + (colWidth*3) + (colWidth/2), rowY, 
                { align: 'center' });
        doc.text(cells[4].textContent, 
                margin + (colWidth*4) + (colWidth/2), rowY, 
                { align: 'center' });
    });
    
    // Footer
    const footerY = y + (rowHeight * contentRows.length) + 30;
    const date = new Date().toLocaleDateString('id-ID', { 
        day: 'numeric', 
        month: 'long', 
        year: 'numeric' 
    });
    
    doc.text(`Padang, ${date}`, pageWidth - margin - 50, footerY);
    doc.setFont('helvetica', 'bold');
    doc.text('(Attin Bimbel)', pageWidth - margin - 50, footerY + 25);
    
    doc.save('laporan_guru.pdf');
}
</script>