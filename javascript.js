const games = [
  'Pixel Quests: An epic pixel art adventure.',
  'Cyber Drift: Neon-lit cyberpunk racing game.',
  'Forest Whispers: Calm exploration in a mystical forest.',
  'Starbound Legends: Space exploration and survival.',
  'Tiny Town Tycoon: Build and manage your dream town.',
  'Echoes of Time: A time travel puzzle platformer.'
];

document.addEventListener('DOMContentLoaded', () => {
  const btn = document.getElementById('randomGameBtn');
  const result = document.getElementById('randomGameResult');
  if (btn && result) {
    btn.addEventListener('click', () => {
      const randomIndex = Math.floor(Math.random() * games.length);
      result.textContent = games[randomIndex];
    });
  }

  const form = document.getElementById('contactForm');
  if (form) {
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      alert('Thank you for your message, ' + form.name.value + '!');
      form.reset();
    });
  }
});
