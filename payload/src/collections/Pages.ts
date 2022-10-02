import { CollectionConfig } from 'payload/types';
import { pageAndPostFields } from '../fields/page-post';

export const Pages: CollectionConfig = {
  slug: 'pages',
  admin: {
    useAsTitle: 'title',
  },
  access: {
    read: () => true,
  },
  fields: pageAndPostFields,
}