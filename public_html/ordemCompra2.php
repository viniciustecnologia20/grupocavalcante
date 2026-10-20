<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Extrair Tabela do PDF</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
</head>

<body>
  <h1>Ordem de compra</h1>
  <input type="file" id="upload" />
  <pre id="output"></pre>

  <h1>Extrair Tabela do PDF</h1>
  <input type="file" id="upload2" />
  <pre id="output"></pre>

  <script>
    document.getElementById('upload').addEventListener('change', async (event) => {
      const file = event.target.files[0];
      if (!file) return;

      const pdfjsLib = window['pdfjs-dist/build/pdf'];
      pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js';

      const reader = new FileReader();
      reader.onload = async function() {
        const pdfData = new Uint8Array(this.result);
        const pdfDoc = await pdfjsLib.getDocument({
          data: pdfData
        }).promise;

        let fullText = '';
        for (let pageNum = 1; pageNum <= pdfDoc.numPages; pageNum++) {
          const page = await pdfDoc.getPage(pageNum);
          const textContent = await page.getTextContent();
          fullText += textContent.items.map((item) => item.str).join('\n') + '\n';
        }

        extractTable(fullText);
      };

      reader.readAsArrayBuffer(file);
    });

    function extractTable(text) {
      const output = document.getElementById('output');

      // Identificar o início e fim da tabela
      const tableStart = text.indexOf('Itens da compra');
      const tableEnd = text.indexOf('Total de produtos');

      if (tableStart === -1 || tableEnd === -1) {
        output.textContent = 'Tabela não encontrada no PDF.';
        return;
      }

      const tableContent = text.slice(tableStart, tableEnd).trim();
      const rows = tableContent.split('\n').filter((line) => line.trim());

      const data = [];
      let currentItem = {
        item: '',
        gtin: '',
        qtde: '',
        un: '',
        valor: '',
        ipi: '',
        total: ''
      };

      rows.forEach((row, index) => {
        if (row.startsWith(' ')) {
          // Concatena linhas de descrição até encontrar "SKU"
          currentItem.item = row;
          for (let i = index + 1; i < rows.length; i++) {
            if (rows[i].startsWith('SKU')) break;
            currentItem.item += ' ' + rows[i];
          }
        } else if (row.startsWith('SKU:')) {
          currentItem.item += ' ' + row; // Adiciona SKU à descrição
        } else if (row.match(/^\d{13}/)) {
          currentItem.gtin = row + ' ' + (rows[index + 1] || '').trim();
        } else if (row.match(/^\d+$/)) { // Linha com Qtde
          currentItem.qtde = row;
          currentItem.un = rows[index + 1] || '';
          currentItem.valor = rows[index + 2] || '';
          currentItem.ipi = rows[index + 3] || '';
          currentItem.total = rows[index + 4] || '';
          data.push({
            ...currentItem
          });
          currentItem = {
            item: '',
            gtin: '',
            qtde: '',
            un: '',
            valor: '',
            ipi: '',
            total: ''
          };
        }
      });

      output.textContent = JSON.stringify(data, null, 2);
    }
  </script>
<!------------------------------------------------------------------------------------------------------------------------------ ---->
  <script>
    document.getElementById('upload2').addEventListener('change', async (event) => {
      const file = event.target.files[0];
      if (!file) return;

      const pdfjsLib = window['pdfjs-dist/build/pdf'];
      pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js';

      const reader = new FileReader();
      reader.onload = async function() {
        const pdfData = new Uint8Array(this.result);
        const pdfDoc = await pdfjsLib.getDocument({
          data: pdfData
        }).promise;

        let fullText = '';
        for (let pageNum = 1; pageNum <= pdfDoc.numPages; pageNum++) {
          const page = await pdfDoc.getPage(pageNum);
          const textContent = await page.getTextContent();
          fullText += textContent.items.map((item) => item.str).join('\n') + '\n';
        }

        extractTable(fullText);
      };

      reader.readAsArrayBuffer(file);
    });

    function extractTable(text) {
      const output = document.getElementById('output');

      // Identificar início e fim da tabela
      const tableStart = text.indexOf("IT Produto Descricao");
      const tableEnd = text.indexOf("T O T A I S");

      if (tableStart === -1 || tableEnd === -1) {
        output.textContent = 'Tabela não encontrada no PDF.';
        return;
      }

      const tableContent = text.slice(tableStart, tableEnd).trim();
      const rows = tableContent.split('\n').filter((line) => line.trim());

      const data = [];
      rows.forEach((row) => {
        const match = row.match(
          /^(\d+)\s+([\w\/-]+)\s+[\w\d\s-]+\s+\d+\s+([\d,.]+)\s+([\d,.]+)\s+([\d,.]+)$/
        );

        if (match) {
          data.push({
            Produto: match[2],
            Quant: match[3],
            "Prc Unitario": match[4],
            "Vl.Tot.C/IPI": match[5],
          });
        }
      });

      output.textContent = JSON.stringify(data, null, 2);
    }
  </script>
</body>

</html>