import * as React from 'react';
import Button from '@mui/material/Button';
import DeleteIcon from '@mui/icons-material/Delete';
import SendIcon from '@mui/icons-material/Send';
import Stack from '@mui/material/Stack';

export default function Morebutton() {
  return (
    <Stack direction="row" spacing={2}>
      
      <Button variant="contained" endIcon={<SendIcon /> } sx={{fontWeight:"bold"}}color="success">
        Read News and Updates
      </Button>
    </Stack>
  )
};