(function () {
  const POLL_MS = 4000;

  function readSnapshot(doc) {
    const el = (doc || document).getElementById('quiz-snapshot');
    if (!el) return null;
    try { return JSON.parse(el.textContent); } catch (e) { return null; }
  }

  function renderScoreboard(players) {
    const tbody = document.getElementById('admin-placar-body');
    if (!tbody) return;
    const sorted = [...players].sort((a, b) => Number(b.score) - Number(a.score));
    tbody.innerHTML = sorted.map(p => `
      <tr>
        <td>${escapeHtml(p.nickname)}</td>
        <td>${Number(p.score)}</td>
        <td>${escapeHtml(p.state)}</td>
      </tr>
    `).join('');
  }

  function renderPlayerList(players) {
    const container = document.getElementById('players-wrap');
    if (!container) return;
    const sorted = [...players].sort((a, b) => a.index - b.index);
    container.innerHTML = sorted.map(p => `
      <div class="player">
        <p class="id">${p.index}</p>
        <p class="nickname">${escapeHtml(p.nickname)}</p>
      </div>
    `).join('');
  }

  function escapeHtml(s) {
    return String(s).replace(/[&<>"']/g, c => ({
      '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;'
    }[c]));
  }

  const initial = readSnapshot(document);
  if (initial) {
    if (initial.players) {
      renderScoreboard(initial.players);
      renderPlayerList(initial.players);
    }
  }

  let lastStatus = initial ? initial.status : null;
  let lastResetCounter = initial ? initial.reset_counter : null;

  async function poll() {
    try {
      const res = await fetch('index.php', {
        credentials: 'same-origin',
        headers: { 'X-Requested-With': 'quiz-poll' },
        cache: 'no-store'
      });
      const text = await res.text();
      const parser = new DOMParser();
      const doc = parser.parseFromString(text, 'text/html');
      const snap = readSnapshot(doc);
      if (!snap) return;

      if (snap.status !== lastStatus || snap.reset_counter !== lastResetCounter) {
        window.location.reload();
        return;
      }

      renderScoreboard(snap.players || []);
      renderPlayerList(snap.players || []);
    } catch (err) {
      console.debug('[quiz] poll failed', err);
    }
  }

  // Só faz polling se não estiver na tela de pergunta
  if (!document.getElementById('quiz-question')) {
    setInterval(poll, POLL_MS);
  }
})();