import './bootstrap';
import Chart from 'chart.js/auto';

document.addEventListener('DOMContentLoaded', () => {
  // event listener for menu button
  const menuBtn = document.getElementById('menu-button');
  if (menuBtn) {
    menuBtn.addEventListener('click', (e) => {
      const sidebar = document.getElementsByClassName('sidebar')[0];
      sidebar.classList.toggle('d-none');
    })
  }

  // event listener for search form submit
  const searchForm = document.getElementById('search-form');
  if (searchForm) {
    searchForm.addEventListener('submit', (e) => {
      e.preventDefault();
      let formData = new FormData(searchForm);
      fetch('/search-transaksi', { method: "POST", body: formData })
        .then(res => res.json())
        .then(result => {
          let tableBody = document.getElementById('search-table-body');
          tableBody.innerHTML = '';
          result.forEach((transaksi, idx) => {
            let row = `
              <tr>
                <td>${idx+1}</td>
                <td>${transaksi.tanggal_transaksi}</td>
                <td>${transaksi.kode}</td>
                <td>${transaksi.item.nama_item}</td>
                <td>${transaksi.lokasi}</td>
                <td>${transaksi.master_lokasi.nama_lokasi}</td>
                <td>${transaksi.qty_actual}</td>
                <td>${transaksi.npk}</td>
              </tr>
            `;
            tableBody.innerHTML += row;
          });
        });
    })
  }

  // event listener for clear button
  const clearBtn = document.getElementById('clear-button');
  if (clearBtn) {
    clearBtn.addEventListener('click', (e) => {
      e.preventDefault();
      let forms = document.getElementsByTagName('form');
      forms[0].reset();
    })
  }

  // event listener for filter button
  const filterBtn = document.getElementById('filter-button');
  if (filterBtn) {
    const chartCanvas = document.getElementById('achievement-chart');
    const chart = new Chart(chartCanvas, {
      type: 'bar',
      data: {
        labels: ['M001', 'M002', 'M003', 'M004'],
        datasets: [
          {
            label: '% Achievement (Actual / Target)',
            data: [0,0,0,0],
          }
        ]
      },
      options: {
        scales: {
          y: {
            min: 0,
            max: 100,
          }
        }
      }
    });
    filterBtn.addEventListener('click', (e) => {
      e.preventDefault();
      let form = document.getElementById('filter-form');
      let formData = new FormData(form);
      fetch('/get-transaksi', { method: "POST", body: formData })
        .then(res => res.json())
        .then(result => {
          chart.data.datasets[0].data = [0,0,0,0];
          result.forEach((row, idx) => {
            let dataIdx = chart.data.labels.indexOf(row.kode);
            chart.data.datasets[0].data[dataIdx] = (row.total_actual / row.total_target) * 100;
          })
          chart.options.scales.y.max = Math.max(100, Math.max(...chart.data.datasets[0].data));
          chart.update();

        });
    })
  }

});
