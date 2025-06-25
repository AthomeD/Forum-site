// Connect to the Socket.IO server
const socket = io('http://localhost:3000');

// Listen for new messages
socket.on('receiveMessage', (data) => {
  const { contactId, message, type, created_at } = data;

  // Display message only if it belongs to the active chat
  if (contactId === activeChat) {
    const chatBody = document.getElementById('chat-body');
    const messageDiv = document.createElement('div');
    messageDiv.className = `message ${type}`;
    messageDiv.innerHTML = `<p>${message}</p><span>${new Date(created_at).toLocaleString()}</span>`;
    chatBody.appendChild(messageDiv);
    chatBody.scrollTop = chatBody.scrollHeight; // Auto-scroll to the bottom
  }
});

// Register the user with their ID after connecting
const userId = 1; // Replace with the logged-in user ID
socket.emit('register', userId);

// Active chat tracking
let activeChat = null;

// Fetch Contacts and Render
function fetchContacts() {
  toggleLoading(true);
  fetch('get_contacts.php')
    .then((response) => response.json())
    .then((data) => {
      toggleLoading(false);
      if (data.status === "success") {
        const contactList = document.querySelector('.contact-list');
        contactList.innerHTML = ''; // Clear existing contacts
        data.contacts.forEach((contact) => {
          const contactDiv = document.createElement('div');
          contactDiv.className = 'contact-item';
          contactDiv.setAttribute('data-chat', contact.id);
          contactDiv.innerHTML = `
            <div class="contact-avatar"></div>
            <div class="contact-text">
              <h4>${contact.contact_name}</h4>
              <p>${contact.last_message || 'No messages yet'}</p>
            </div>
            <span class="contact-date">${new Date(contact.last_message_date).toLocaleString()}</span>
          `;
          contactDiv.addEventListener('click', () => loadChat(contact.id, contact.contact_name));
          contactList.appendChild(contactDiv);
        });
      } else {
        showError('Failed to fetch contacts');
      }
    })
    .catch(() => {
      toggleLoading(false);
      showError('Error fetching contacts');
    });
}

// Load Messages for a Chat
function loadChat(contactId, contactName) {
  toggleLoading(true);
  fetch(`get_messages.php?contact_id=${contactId}`)
    .then((response) => response.json())
    .then((data) => {
      toggleLoading(false);
      if (data.status === "success") {
        const chatBody = document.getElementById('chat-body');
        chatBody.innerHTML = ''; // Clear existing messages

        data.messages.forEach((msg) => {
          const messageDiv = document.createElement('div');
          messageDiv.className = `message ${msg.type}`;
          messageDiv.innerHTML = `<p>${msg.message}</p><span>${new Date(msg.created_at).toLocaleString()}</span>`;
          chatBody.appendChild(messageDiv);
        });

        // Update chat header
        document.getElementById('chat-name').textContent = contactName;
        activeChat = contactId;

        // Enable input fields
        document.getElementById('message-input').disabled = false;
        const sendButton = document.getElementById('send-button');
        sendButton.disabled = false;
        sendButton.setAttribute('data-contact', contactId);
      } else {
        showError('Failed to load chat messages');
      }
    })
    .catch(() => {
      toggleLoading(false);
      showError('Error loading chat');
    });
}

// Send Message
document.getElementById('send-button').addEventListener('click', () => {
  const contactId = document.getElementById('send-button').getAttribute('data-contact');
  const messageInput = document.getElementById('message-input');
  const message = messageInput.value.trim();

  if (message) {
    fetch('send_message.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: `contact_id=${contactId}&message=${message}`,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.status === "success") {
          loadChat(contactId, document.getElementById('chat-name').textContent);
          messageInput.value = ''; // Clear input field
        } else {
          showError('Failed to send message');
        }
      })
      .catch(() => {
        showError('Error sending message');
      });
  }
});

// Utility: Toggle Loading Spinner
function toggleLoading(show) {
  document.getElementById("loading-spinner").style.display = show ? "block" : "none";
}

// Utility: Show Error Messages
function showError(message) {
  alert(`Error: ${message}`);
}

// Initial Load
fetchContacts();
