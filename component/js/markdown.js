// Ubah urlFile menjadi URL file Markdown yang ingin Anda tampilkan
const urlFile = "<?php echo "node/guide/" . $guide_link; ?>";


// Ambil konten file Markdown menggunakan XMLHttpRequest
const xhr = new XMLHttpRequest();
xhr.open("GET", urlFile, true);
xhr.onreadystatechange = function () {
  if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
    const markdownContent = xhr.responseText;

    // Konversi Markdown menjadi HTML menggunakan Showdown
    const converter = new showdown.Converter();
    const htmlContent = converter.makeHtml(markdownContent);
    document.getElementById("markdownContent").innerHTML = htmlContent;

    // Terapkan highlight syntax pada blok kode menggunakan Highlight.js
    document.querySelectorAll("pre code").forEach((block) => {
      hljs.highlightBlock(block);

      // Buat tombol salin
      const copyButton = document.createElement("button");
      copyButton.classList.add("copy-button");
      copyButton.innerHTML = `
                        <i class="far fa-copy copy-icon" style="color: #000;"></i>`;

      // Tambahkan event listener pada tombol salin
      copyButton.addEventListener("click", () => {
        const codeText = block.textContent;
        navigator.clipboard
          .writeText(codeText)
          .then(() => {
            copyButton.classList.add("copied");
            setTimeout(() => {
              copyButton.classList.remove("copied");
            }, 1500);
          })
          .catch((error) => {
            console.error("Gagal menyalin teks:", error);
          });
      });

      // Tambahkan tombol salin pada blok kode
      block.parentNode.insertBefore(copyButton, block);
    });
  }
};
xhr.send();
