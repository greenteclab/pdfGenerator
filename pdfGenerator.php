<?php

class PDFGenerator {
    private $content;
    
    public function __construct($content) {
        $this->content = $content;
    }
    
    public function generatePDF($filename) {
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $filename . '.pdf"');
        
        echo '%PDF-1.3' . "\n";
        echo '1 0 obj' . "\n";
        echo '<< /Type /Catalog /Pages 2 0 R >>' . "\n";
        echo 'endobj' . "\n";
        echo '2 0 obj' . "\n";
        echo '<< /Type /Pages /Kids [3 0 R] /Count 1 >>' . "\n";
        echo 'endobj' . "\n";
        echo '3 0 obj' . "\n";
        echo '<< /Type /Page /Parent 2 0 R /Resources << /Font << /F1 4 0 R >> >> /Contents 5 0 R >>' . "\n";
        echo 'endobj' . "\n";
        echo '4 0 obj' . "\n";
        echo '<< /Type /Font /Subtype /Type1 /BaseFont /Helvetica >>' . "\n";
        echo 'endobj' . "\n";
        echo '5 0 obj' . "\n";
        echo '<< /Length 52 >> stream' . "\n";
        echo 'BT /F1 12 Tf 50 700 Td (' . $this->content . ') Tj ET' . "\n";
        echo 'endstream' . "\n";
        echo 'endobj' . "\n";
        echo 'xref' . "\n";
        echo '0 6' . "\n";
        echo '0000000000 65535 f' . "\n";
        echo '0000000009 00000 n' . "\n";
        echo '0000000054 00000 n' . "\n";
        echo '0000000114 00000 n' . "\n";
        echo '0000000185 00000 n' . "\n";
        echo '0000000276 00000 n' . "\n";
        echo 'trailer' . "\n";
        echo '<< /Size 6 /Root 1 0 R >>' . "\n";
        echo 'startxref' . "\n";
        echo '391' . "\n";
        echo '%%EOF';
    }
}

// Beispielverwendung
$content = 'Hier ist der Inhalt für dein PDF-Dokument.';
$filename = 'mein_pdf_dokument';
$pdfGenerator = new PDFGenerator($content);
$pdfGenerator->generatePDF($filename);
