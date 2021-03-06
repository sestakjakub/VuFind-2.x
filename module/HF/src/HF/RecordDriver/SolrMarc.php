<?php
namespace HF\RecordDriver;
use PortalsCommon\RecordDriver\SolrMarc As ParentSolrDefault;

/*
 * Default record driver for HF
 *
 */
class SolrMarc extends ParentSolrDefault
{
    public function getInstitutions() {
        return isset($this->fields['institutionAlbumsOnly'])
        ? $this->fields['institutionAlbumsOnly'] : array();
    }
    
    public function getSignature() {
        $field = $this->marcRecord->getField('910');
        if ($field) {
            $subfield = $field->getSubfield('b');
            if ($subfield) {
                return $subfield->getData();
            }
        }
        
        $field = $this->marcRecord->getField('996');
        if ($field) {
            $subfield = $field->getSubfield('c');
            return $subfield ? $subfield->getData() : '';
        }
        return '';
    }
    
    public function getId() {
        return $this->fields['id'];
    }
    
    public function getThumbnail()
    {
        
        if (isset($this->fields['format'])) {
            if (in_array('hf_books', $this->fields['format'])) return 'format/Book.png';
        }
        if (isset($this->fields['format'])) {
            if (in_array('hf_maps', $this->fields['format'])) return 'format/Map.png';
        }
        if (isset($this->fields['format'])) {
            if (in_array('hf_visual_documents', $this->fields['format'])) return 'format/Photo.png';
        }
        if (isset($this->fields['format'])) {
            if (in_array('hf_periodicals', $this->fields['format'])) return 'format/Newspaper.png';
        }
        if (isset($this->fields['format'])) {
            if (in_array('hf_musical_score', $this->fields['format'])) return 'format/Musical Score.png';
        }
        if (isset($this->fields['format'])) {
            if (in_array('hf_microforms', $this->fields['format'])) return 'format/Microfilm.png';
        }

        return 'format/Book.png';
    }
}
