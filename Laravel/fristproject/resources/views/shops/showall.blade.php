<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>All Accounts</title>

  <style>
    /* Basic reset */
    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f4f6f8;
      color: #333;
      padding: 30px;
    }

    .wrap {
      max-width: 1100px;
      margin: 0 auto;
    }

    header {
      display:flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    header h1 {
      font-size: 22px;
      color: #222;
    }

    .controls {
      display:flex;
      gap: 12px;
      align-items: center;
    }

    input.search {
      padding: 10px 12px;
      border-radius: 8px;
      border: 1px solid #d0d7de;
      min-width: 220px;
    }

    .btn {
      padding: 10px 14px;
      border-radius: 8px;
      border: none;
      cursor: pointer;
      background: #3498db;
      color: #fff;
    }

    .btn.secondary { background: #2ecc71; }
    .btn.danger { background: #e74c3c; }

    .card {
      background: #fff;
      border-radius: 12px;
      padding: 16px;
      box-shadow: 0 4px 12px rgba(17,24,39,0.06);
    }

    .table-wrap {
      overflow-x: auto;
    }

    table.users {
      width: 100%;
      border-collapse: collapse;
      min-width: 700px;
    }

    table.users thead th {
      text-align: left;
      padding: 14px 12px;
      background: #f7fafc;
      color: #444;
      font-size: 13px;
    }

    table.users tbody td {
      padding: 12px;
      border-top: 1px solid #eee;
      vertical-align: middle;
    }

    .muted { color: #6b7280; font-size: 13px; }

    .actions { display:flex; gap:8px; }

    .pill {
      display:inline-block;
      padding:6px 10px;
      border-radius:999px;
      background:#eef2ff;
      color:#4338ca;
      font-size:13px;
    }

    /* Responsive */
    @media (max-width: 720px) {
      header { flex-direction: column; align-items: flex-start; gap: 12px; }
      .controls { width: 100%; justify-content: space-between; }
      input.search { width: 100%; max-width: 100%; }
    }
  </style>
</head>
<body>
  <div class="wrap">
    <header>
      <h1>All Accounts</h1>

      <div class="controls">
        <input type="text" id="search" class="search" placeholder="Search by name or email..." oninput="filterTable()" />
        <a href="{{ route('shops.register') }}" class="btn secondary">Create New</a>
        <a href="{{ route('shops.index') }}" class="btn secondary">Home</a>
      </div>
    </header>

    <div class="card">
      <div class="table-wrap">
        <table class="users" id="usersTable" aria-describedby="accounts">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Created</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>

          <tbody>
            @forelse($users as $user)
            <tr>
              <td>{{ $user->id }}</td>
              <td>
                <strong>{{ $user->name }}</strong>
                <div class="muted">{{ $user->role ?? '' }}</div>
              </td>
              <td>{{ $user->email }}</td>
              <td class="muted">{{ $user->created_at->format('Y-m-d') }}</td>
              <td><span class="pill">{{ $user->email_verified_at ? 'Verified' : 'Unverified' }}</span></td>
              <td class="actions">
                <a href="" class="btn" style="background:#6b7280;">View</a>
                <a href="" class="btn" style="background:#0ea5a4;">Edit</a>

               
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="6" class="muted">No accounts found.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      <!-- optional pagination (if you pass paginate() from controller) -->
      <div style="margin-top:16px;">
        {{ $users->links() ?? '' }}
      </div>
    </div>
  </div>

  <script>
    // simple client-side filter for quick searching
    function filterTable() {
      const q = document.getElementById('search').value.toLowerCase();
      const rows = document.querySelectorAll('#usersTable tbody tr');

      rows.forEach(row => {
        const name = row.cells[1]?.innerText.toLowerCase() || '';
        const email = row.cells[2]?.innerText.toLowerCase() || '';
        const visible = name.includes(q) || email.includes(q);
        row.style.display = visible ? '' : 'none';
      });
    }
  </script>
</body>
</html>
