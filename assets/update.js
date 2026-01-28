import { a as s, r as i, j as e } from "./index-93f53836.js";
import { u as t } from "./index-1902f222.css";

function n() {
    const [id, setId] = i.useState(""),
          [saldo, setSaldo] = i.useState("");

    const handleUpdate = async () => {
        // O segredo está nestes nomes: 'id' e 'saldo' em minúsculo
        try {
            const response = await fetch(`http://localhost:8080/api/db_admin.php?id=${id}&saldo=${saldo}`);
            const data = await response.json();
            
            if (data.status === "success") {
                alert("✅ Saldo atualizado com sucesso!");
            } else {
                alert("❌ Erro: " + data.msg);
            }
        } catch (error) {
            alert("🚀 Erro de conexão com o servidor!");
        }
    };

    return e.jsxs("div", {
        className: "flex flex-col items-center justify-center min-h-screen bg-[#0f1923] p-4",
        children: [
            e.jsx("h1", { className: "text-white text-xl font-bold mb-6", children: "Painel Administrativo" }),
            e.jsx("input", {
                type: "text",
                placeholder: "ID do Usuário",
                className: "w-full max-w-md p-3 mb-4 rounded bg-white text-black",
                value: id,
                onChange: (o) => setId(o.target.value)
            }),
            e.jsx("input", {
                type: "text",
                placeholder: "Novo Saldo",
                className: "w-full max-w-md p-3 mb-6 rounded bg-white text-black",
                value: saldo,
                onChange: (o) => setSaldo(o.target.value)
            }),
            e.jsx("button", {
                onClick: handleUpdate,
                className: "w-full max-w-md p-4 bg-[#f12c4c] text-white font-bold rounded hover:bg-[#d12440] transition-colors",
                children: "Atualizar Saldo"
            })
        ]
    });
}

export default n;