<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document; // Certifique-se de importar o modelo
use App\Models\DocumentType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function store(Request $request, $id_type)
    {
        $filePath = $request->file('file')->store('documents');

        $document = Document::create([
            'document_type_id' => $id_type,
            'student_id' => Auth::user()->id,
            'file_path' => $filePath,
            'status' => 1, // 1 enviado aguardando validação 2 aprovado 3 reprovado
        ]);

        return response()->json([
            'message' => 'Documento enviado com sucesso',
            'document' => $document,
        ], 201);
    }

    public function listDocuments()
    {
        // Obter os tipos de documentos obrigatórios
        $requiredDocumentTypes = DocumentType::where('is_required', true)->get();

        // Inicializar as listas de documentos enviados e não enviados
        $sentDocuments = [];
        $pendingDocuments = [];

        foreach ($requiredDocumentTypes as $documentType) {
            // Verificar se o usuário já enviou o documento para esse tipo
            $document = Document::where('document_type_id', $documentType->id)
                ->where('student_id', Auth::user()->id)
                ->first();
            
            // Se o documento foi enviado (existe registro)
            if ($document) {
                // Adicionar documento à lista de enviados, mantendo o status
                $sentDocuments[] = [
                    'document_type' => $documentType,
                    'file_path' => $document->file_path,
                    'status' => $document->status // Usando a coluna status
                ];
            } else {
                // Se o documento não foi enviado (não existe registro)
                $pendingDocuments[] = [
                    'document_type' => $documentType,
                    'status' => 'not_env'
                ];
            }
        }

        // Unir as duas listas: documentos enviados e documentos pendentes
        $allDocuments = array_merge($sentDocuments, $pendingDocuments);

        return response()->json([
            'documents' => $allDocuments
        ]);
    }
}
