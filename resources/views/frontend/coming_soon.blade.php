<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Coming Soon - Gopinathan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: "Segoe UI", sans-serif;
      background: linear-gradient(135deg, #f5f7ff, #eae6ff);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
    }

    .coming-soon-container {
      max-width: 650px;
      padding: 20px;
    }

    h1 {
      font-size: 48px;
      color: #36327B;
      margin-bottom: 20px;
      letter-spacing: 1px;
    }

    .subtitle {
      font-size: 22px;
      color: #5a56a3;
      margin-bottom: 12px;
      font-weight: 500;
    }

    .description {
      font-size: 16px;
      color: #555;
      line-height: 1.7;
      margin-bottom: 30px;
    }

    .loader {
      width: 45px;
      height: 45px;
      border: 4px solid #ddd;
      border-top: 4px solid #36327B;
      border-radius: 50%;
      animation: spin 1s linear infinite;
      margin: 0 auto;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    @media (max-width: 600px) {
      h1 {
        font-size: 34px;
      }
      .subtitle {
        font-size: 18px;
      }
      .description {
        font-size: 14px;
      }
    }
  </style>
</head>
<body>

  <div class="coming-soon-container">

    <h1>Gopinathan</h1>

    <div class="subtitle">Align. Heal. Transform. </div>

    <div class="description">
      A sacred space for chakra healing and inner balance is on its way.
      Prepare to reconnect with your energy, restore harmony, and awaken your true self.
    </div>

    {{-- <div class="loader"></div> --}}

  </div>

</body>
</html>
